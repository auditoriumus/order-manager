<?php


namespace App\Repositories\Categories;


use App\Models\Category;

class CategoryRepository
{
    public static function getAllCategories()
    {
        return Category::with('menus')->get();
    }

    public static function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public static function createNewCategory($data)
    {
        $category = new Category();
        $category->title = $data['title'];
        return $category->save();
    }

    public static function deleteCategory($id)
    {
        return Category::destroy($id);
    }

    public static function updateCategory($id, $title)
    {
        $category = Category::find($id);
        $category->title = $title;
        return $category->update();
    }
}
