<?php


namespace App\Services\Categories;


use App\Repositories\Categories\CategoryRepository;

class GetCategoryByIdService
{
    public static function getCategoryById($id)
    {
        return CategoryRepository::getCategoryById($id);
    }
}
