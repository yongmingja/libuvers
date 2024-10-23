<?php

namespace Modules\Library\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Library\Http\Requests\Books\StoreBookRequest;
use Modules\Library\Http\Requests\Books\UpdateBookRequest;
use Modules\Library\Models\LibraryBookBook;

class LibraryBookBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'books' => LibraryBookBook::all()->except('1')
        ];

        return view('library::books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('library::books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
    {
        $request->validated();

        try {
            DB::transaction(function () use ($request) {
                LibraryBookBook::create([
                    'name' => $request->input('name'),
                    'bookname' => $request->input('bookname'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                ]);
            });
            toast(__('Book added successfully.'), 'success');
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            Log::error('Book creation failed: ' . $e->getMessage());
            toast(__('Failed to add book. Please try again.'), 'warning');
            return back()->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show(LibraryBookBook $book)
    {
        return view('library::books.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibraryBookBook $book)
    {
        $data = [
            'book' => $book
        ];

        $title = 'Delete Book!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('library::books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, UpdateBookRequest $book): RedirectResponse
    {
        $request->validated();

        try {
            DB::transaction(function () use ($request, $book) {
                $book->update([
                    'name' => $request->input('name'),
                    'bookname' => $request->input('bookname'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password') ?? $book->password,
                ]);
            });
            toast(__('Book updated successfully.'), 'success');
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            Log::error('Book update failed: ' . $e->getMessage());
            toast(__('Failed to update book. Please try again.'), 'warning');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryBookBook $book)
    {
        try {
            DB::transaction(function () use ($book) {
                $book->delete();
            });
            toast(__('Book deleted successfully.'), 'success');
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            Log::error('Book delete failed: ' . $e->getMessage());
            toast(__('Failed to delete Book. Please try again.'), 'warning');
            return back()->withInput();
        }
    }
}
