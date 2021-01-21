<?php


namespace App\Services\Categories;


use App\Repositories\Categories\CategoryRepository;

class CreateNewCategoryService
{
    public static function createNewCategory($data)
    {
        return CategoryRepository::createNewCategory($data);
    }
}
