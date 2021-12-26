<div class="row">
    <div class="col-sm-6">
        @if ($query->hasPages())
            <nav class="cm-pagination">
                <ul class="pagination pagination-sm">
                    {{-- Previous Page Link --}}
                    @if ($query->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&lsaquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $query->previousPageUrl() }}" rel="prev">&lsaquo;</a></li>
                    @endif

                    @if($query->currentPage() > 3)
                        <li class="page-item hidden-xs"><a class="page-link" href="{{ $query->url(1) }}">1</a></li>
                    @endif
                    @if($query->currentPage() > 4)
                        <li class="page-item"><span class="page-link">...</span></li>
                    @endif
                    @foreach(range(1, $query->lastPage()) as $i)
                        @if($i >= $query->currentPage() - 2 && $i <= $query->currentPage() + 2)
                            @if ($i == $query->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $query->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
                    @endforeach
                    @if($query->currentPage() < $query->lastPage() - 3)
                        <li class="page-item"><span class="page-link">...</span></li>
                    @endif
                    @if($query->currentPage() < $query->lastPage() - 2)
                        <li class="page-item hidden-xs"><a class="page-link" href="{{ $query->url($query->lastPage()) }}">{{ $query->lastPage() }}</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($query->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $query->nextPageUrl() }}" rel="next">&rsaquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&rsaquo;</span></li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>
    <div class="col-sm-6 cm-pagination-text">
        <?php
        $pagcountst = ($query->currentPage() - 1) * $itemPerPage + 1;
        $pagcountnd = ($query->currentPage() - 1) * $itemPerPage + $query->count();
        $currentItem = '';
        if ($pagcountnd == 0 || $pagcountst > $pagcountnd) {
            $current = '0';
        } elseif ($pagcountst == $pagcountnd) {
            $current = $pagcountnd;
            $currentItem = __('no.') . ' ';
        } else {
            $current = $pagcountst . ' - ' . $pagcountnd;
        }
        ?>
        <span>
            {{ view_html( __('showing: :currentItem <span>:current</span> of <span>:total</span> :itemname',['currentItem'=>$currentItem, 'current'=>$current, 'total'=>$query->total(), 'itemname'=>$itemName])) }}
        </span>
    </div>
</div>
</div>
