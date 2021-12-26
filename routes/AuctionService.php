<?php

namespace App\Services\Admin;

use App\Repositories\Admin\Interfaces\CategoryInterface;
use App\Repositories\User\Interfaces\AddressInterface;
use App\Repositories\User\Interfaces\AuctionInterface;
use App\Repositories\User\Interfaces\AuctionSessionInterface;
use App\Repositories\User\Interfaces\BidInterface;
use App\Repositories\User\Interfaces\CommentInterface;
use App\Services\Core\DataListService;
use Carbon\Carbon;
use App\Models\User\UserAuction;
use App\Models\User\Bid;
use App\Services\User\WinnerSelectionService;
use App\Repositories\User\Interfaces\NotificationInterface;
use App\Events\OpenCloseAuctionEvent;


class AuctionService
{
    protected $auction;
    protected $auctionSession;

    public function __construct(AuctionInterface $auction, AuctionSessionInterface $auctionSession)
    {
        $this->auction = $auction;
        $this->auctionSession = $auctionSession ;
    }

    public function auctionDetails($id)
    {
        $data['auction'] = $this->auction->findOrFailById($id);

        $data['auctionId'] = $id;
        $data['carbon'] = new Carbon();
        $data['defaultAddress'] = $data['auction']->seller->address()->where('is_default', ACTIVE_STATUS_ACTIVE)->first();
        $data['categories'] = app(CategoryInterface::class)->getAll()->pluck('name', 'id')->toArray();
        $data['comments'] = app(CommentInterface::class)->getByConditions(['auction_id' => $id]);
        if (auth()->check())
        {
            $data['userLastBid'] = $data['auction']->bids()->orderBy('id', 'desc')->where('user_id', auth()->user()->id)->first();
        }
        $data['highestBid'] = $data['auction']->bids()->orderBy('amount', 'desc')->first();

        $bids = app(BidInterface::class);
        $data['isWinner'] = $bids->getFirstByConditions(['auction_id' => $id, 'is_winner' => AUCTION_WINNER_STATUS_WIN]);
        if(!is_null($data['isWinner']))
        {
            $data['address'] = app(AddressInterface::class)->getFirstByConditions(['id' => $data['isWinner']->auction->address_id]);
        }

        $dateNow = Carbon::now('UTC')->addHour(1)->format('Y-m-d H:i:s');

        $where = ['auction_id' => $id];
        $query = $bids->paginateWithFilters([], null, $where);
        $data['list'] = app(DataListService::class)->dataList($query, null);
        $data['title'] = __('Auction Details');
        $data['chrono'] = $this->showCounterBid($id) ;
        $data['trueTimer'] = $this->runningTimer($id);
        $data['dateNow2'] = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');

        $data['currentSession'] = $data['auction']->sessions()->where('session_date', '>=', $dateNow)->where('status', '!=', '3')->orderBy('session_date', 'asc')->first();


        // $data['now'] = now()->format('Y-m-d H:i:s') ;
        $data['now'] = $dateNow ;
        if($data['auction']->gratuit == 1){

        }
        // echo $auctionSession[1]->session_date ;

        return $data;
    }

    public function openAuctionAutomatically()
    {
        $parameters['status'] = AUCTION_STATUS_RUNNING ;
        $dateNow = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');
        // $dateNow = Carbon::now()->format('Y-m-d H:i:s');
        $auctions =  $this->auction->getTodayUpcoming($dateNow) ;
        echo " all auctions: ".$auctions . " -- ". " date now: ". $dateNow ;
        foreach($auctions as $auction){
            // $nbrEstInscrit = UserAuction::where("auction_id", $id)->count();
            echo " auction: ".$auction->id ;
            echo "datenow: ". $dateNow. " starting date: ".$auction->starting_date ;
            if($auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER){
                // if(($auction->starting_date <= $dateNow)&&($nbrEstInscrit == $auction->nbr_inscripteur_requise)){
                    echo "datenow: ". $dateNow. " starting date: ".$auction->starting_date . " ** ";
                if(($auction->starting_date <= $dateNow)){
                    $statusUpdated = $this->auction->update($parameters, $auction->id);
                    if($statusUpdated){
                        echo "auction is started" ;
                        event(new OpenCloseAuctionEvent($auction)) ;
                    }else{
                        echo "auction is not started !";
                    }
                }
            }
        }
    }

    public function openAuctionManually($id)
    {
        $parameters['status'] = AUCTION_STATUS_RUNNING ;
        // $dateNow = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');
        $auction = $this->auction->findOrFailById($id);

        $statusUpdated = $this->auction->update($parameters, $id);
        if($statusUpdated){
            event(new OpenCloseAuctionEvent($auction)) ;
        }

    }

    public function showCounterBid($id)
    {
        $auction = $this->auction->findOrFailById($id);
            if(count($auction->bids) > 0 && $auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER){
                $bid = Bid::where("auction_id", $id)->orderBy('created_at','desc')->first();
                $firstBid = Bid::where("auction_id", $id)->orderBy('created_at','desc')->first();

                $timeNow = Carbon::now('UTC')->addHour(1);
                $timeLastBid = Carbon::createFromFormat('Y-m-d H:i:s', $bid->created_at);
                $timeFirstBid = Carbon::createFromFormat('Y-m-d H:i:s', $firstBid->created_at)->addHour(1);
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $auction->starting_date);
                $diffTimeBid = $timeNow->diffInSeconds($timeFirstBid);

                if( $diffTimeBid >= $auction->time_bid_chrono ){
                    /** launch Timer */
                    return true ;
                    // return "true: ". $diffTimeBid. " ? ". $auction->time_bid_chrono . " ** ". $timeNow . " - ".  $timeFirstBid;
                }else{
                    /** yet to launch Timer **/
                    return false ;
                    // return "false: ". $diffTimeBid. " ? ". $auction->time_bid_chrono . " ** ". $timeNow . " - ". $timeFirstBid ;
                }

                return null ;
            }
    }

    public function runningTimer($id)
    {
        $auction = $this->auction->findOrFailById($id);
            if(count($auction->bids) > 0 && $auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER){
                $bid = Bid::where("auction_id", $id)->orderBy('created_at','desc')->first();
                $firstBid = Bid::where("auction_id", $id)->orderBy('created_at','asc')->first();
                $timeWaitingBid = $auction->time_waiting_bid ;
                // $delay = $auction->time_bid_chrono + floor(($timeWaitingBid%3600)/60);
                $delay = $auction->time_bid_chrono + $auction->time_waiting_bid ;

                $timeNow = Carbon::now('UTC')->addHour(1);
                $timeLastBid = Carbon::createFromFormat('Y-m-d H:i:s', $bid->created_at->addHour());
                $timeLastBid2 = Carbon::createFromFormat('Y-m-d H:i:s', $timeLastBid);
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $auction->starting_date);
                // $diffTimeBid = $timeLastBid->diff($timeNow)->format('%I:%S');
                $diffTimeBid = $timeLastBid2->diffInSeconds($timeNow);
                $endTimer = 0 ;

                    if( $diffTimeBid <= $auction->time_waiting_bid ){
                        return $diffTimeBid ;
                    }else{
                        return $auction->time_waiting_bid ;
                    }
            }
    }

    public function createAuctionSession($id)
    {
        $session = [];
        $auction = $this->auction->findOrFailById($id);

        $from = Carbon::createFromFormat('Y-m-d H:i:s', $auction->starting_date);
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $auction->ending_date);
        $dateNow = now();
        // $dateNow = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');
        $varSession = null ;

        $durationSession = $to->diffInHours($from);

        $nbrSession = $durationSession / $auction->frequence_time ;

            if(isset($auction->nbr_stock)){
                $varSession = $auction->nbr_stock ;
            }else{
                $varSession = $nbrSession ;
            }

            for($i=0 ; $i<$varSession; $i++)
            {
                $parameters['auction_id'] = $id ;
                $parameters['status'] = AUCTION_SESSION_STATUS_UPCOMING ;

                if($i == 0){
                    $session[$i] = $from->addHours($auction->frequence_time);
                    $parameters['session_date'] = $session[$i] ;
                }else{
                    $session[$i] = $session[$i-1]->addHours($auction->frequence_time) ;
                    $parameters['session_date'] = $session[$i];
                }
                // echo " all sessions: ". $parameters['session_date'] ;
                if($parameters['session_date'] >= $auction->ending_date){
                        break ;
                }
                $creating = $this->auctionSession->create($parameters) ;
            }
    }

    public function finishAuctions($auction, $auctionSession=null)
    {

        // $currentSession = $auction->sessions()->where('session_date', '>=', $dateNow)->where('status', '=', '1')->orderBy('session_date', 'asc')->first();
        // echo "auction id: ". $auction->id ;

        if($auctionSession != null){
            $winAuction = app(WinnerSelectionService::class)->highestBidWinnerAuction($auction, $auctionSession);

            echo  " win Auction Session? ". $winAuction ;
            return $winAuction ;
        }else{
            $winAuction = app(WinnerSelectionService::class)->highestBidWinnerAuction($auction);
            echo  " win Auction? ". $winAuction ;
            return $winAuction ;
        }

    }

    public function checkAuctions()
    {
        $dateNow = Carbon::now('UTC')->addHour(1);
        $auctionDate = $dateNow->format('Y-m-d');
        $auctions =  $this->auction->getTodayCompletion($auctionDate, false) ;
        $rapidAuctions = $this->auction->getRapidAuctions();
        $auctionsSessions = $this->auctionSession->getTodaySessionCompletion($auctionDate);
        // echo "date now: ". $dateNow. " ". $auctions ;
        // echo " date auction session: ". $auctionsSessions ;

    foreach($auctions as $auction)
    {
        if($dateNow >= $auction->ending_date){
           $closing = $this->finishAuctions($auction) ;
           if($closing){
            event(new OpenCloseAuctionEvent($auction)) ;
           }
        }else{
            echo " the end auction is not now !";
        }
    }

    foreach($auctionsSessions as $auctionSessions)
    {
        // echo " each auction session: ". $auctionSessions->auction ;
        if($dateNow >= $auctionSessions->session_date){
            $closing = $this->finishAuctions($auctionSessions->auction, $auctionSessions) ;
            if($closing){
                event(new OpenCloseAuctionEvent($auctionSessions->auction)) ;
               }
        }else{
            echo " the end auction session is not now !";
        }
    }

        foreach($rapidAuctions as $auction)
        {
            $counter = $this->runningTimer($auction->id);
            echo "counter: ".$counter. " -- id: ". $auction->id  ;
            if($counter === $auction->time_waiting_bid){
                $win = app(WinnerSelectionService::class)->highestBidWinnerAuction($auction);
                echo " paid auction is winner? ". $win ;
                if($win){
                            event(new OpenCloseAuctionEvent($auction)) ;
                        }
                }else{
                        echo "Rapid counter is running ...";
                        }
        }
    }
}





