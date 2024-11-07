<?php

namespace Modules\Library\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Library\Http\Requests\Categories\StoreCategoryRequest;
use Modules\Library\Http\Requests\Categories\UpdateCategoryRequest;
use Modules\Library\Models\LibraryBookCategory;

class LibraryBookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'categories' => LibraryBookCategory::all()->except('1')
        ];

        return view('library::categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('library::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            DB::transaction(function () use ($validatedData, $request) {
                LibraryBookCategory::create([
                    'name' => $validatedData['name'],
                ]);
            });

            toast(__('Category added successfully.'), 'success');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            Log::error('Category creation failed: ' . $e->getMessage());

            toast(__('Failed to add category. Please try again.'), 'warning');
            return back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibraryBookCategory $category)
    {
        $data = [
            'category' => $category,
        ];

        $title = 'Delete Book!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('library::categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, LibraryBookCategory $category): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            DB::transaction(function () use ($validatedData, $request, $category) {
                $category->update([
                    'name' => $validatedData['name'],
                ]);
            });

            toast(__('Category updated successfully.'), 'success');
            return back();
        } catch (\Exception $e) {
            Log::error('Category update failed: ' . $e->getMessage());

            toast(__('Failed to update category. Please try again.'), 'warning');
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryBookCategory $category)
    {
        try {
            DB::transaction(function () use ($category) {
                $category->delete();
            });
            toast(__('Category deleted successfully.'), 'success');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            Log::error('Category delete failed: ' . $e->getMessage());
            toast(__('Failed to delete category. Please try again.'), 'warning');
            return back()->withInput();
        }
    }
}
