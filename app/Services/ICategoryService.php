<?php

namespace App\Services;

use App\Models\Category;

interface ICategoryService
{
    public function getAllCategories();
    public function createCategory($data);
    public function deleteCategory($id);
    public function updateCategory($id, $data);
}