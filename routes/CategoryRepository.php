<?php

namespace App\Repositories\Admin\Eloquent;
use App\Models\Admin\Category;
use App\Repositories\Admin\Interfaces\CategoryInterface;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    /**
    * @var Category
    */
     protected $model;

     public function __construct(Category $category)
     {
        $this->model = $category;
     }

    public function getPopularCategory($limit)
    {
        return $this->model->withCount('auctions')
            ->orderBy('auctions_count', 'desc')
            ->limit($limit)
            ->get();
    }

}
