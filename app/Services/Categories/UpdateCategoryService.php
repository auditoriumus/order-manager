<?php


namespace App\Services\Categories;


use App\Repositories\Categories\CategoryRepository;

class UpdateCategoryService
{
    public static function updateCategory($id, $data)
    {
        $title = $data['title'];
        return CategoryRepository::updateCategory($id, $title);
    }
}
