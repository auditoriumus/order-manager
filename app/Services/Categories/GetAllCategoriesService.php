<?php


namespace App\Services\Categories;


use App\Repositories\Categories\CategoryRepository;

class GetAllCategoriesService
{
    public static function getAllCategories() {
        return CategoryRepository::getAllCategories();
    }
}
