<?php


namespace App\Repositories\Categories;


use App\Models\Category;

class CategoryRepository
{
    public static function getAllCategories()
    {
        return Category::all();
    }

    public static function getMenuByCategoryId($id)
    {
        return Category::find($id);
    }
}
