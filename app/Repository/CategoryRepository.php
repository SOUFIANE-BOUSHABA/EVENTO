<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository implements ICategoryRepository
{
    public function getAll()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
        }
    }

    public function update($id, $data)
    {
        $category = Category::find($id);
        if ($category) {
            $category->update($data);
        }
    }
}