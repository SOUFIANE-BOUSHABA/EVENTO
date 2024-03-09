<?php
namespace App\Repository;

use App\Models\Category;

interface ICategoryRepository
{
    public function getAll();
    public function create(array $data);
    public function delete($id);
    public function update($id, $data);
}