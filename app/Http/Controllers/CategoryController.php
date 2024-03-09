<?php
namespace App\Http\Controllers;

use App\Services\ICategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function showCategory()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('backoffice.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->categoryService->createCategory([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->back();
    }

    public function editCategory(Request $request, $id)
    {
        $this->categoryService->updateCategory($id, ['name' => $request->name]);
        return redirect()->back();
    }
}