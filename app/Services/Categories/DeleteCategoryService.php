<?php


namespace App\Services\Categories;


use App\Repositories\Categories\CategoryRepository;

class DeleteCategoryService
{
    public static function deleteCategory($id)
    {
        return CategoryRepository::deleteCategory($id);
    }
}
