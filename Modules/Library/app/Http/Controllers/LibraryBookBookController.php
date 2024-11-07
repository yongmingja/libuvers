<?php

namespace Modules\Library\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Base\Models\BaseLanguage;
use Modules\Base\Models\BaseSequence;
use Modules\Library\Http\Requests\Books\StoreBookRequest;
use Modules\Library\Http\Requests\Books\UpdateBookRequest;
use Modules\Library\Models\LibraryBookBook;
use Modules\Library\Models\LibraryBookCategory;

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
        $data = [
            'categories' => LibraryBookCategory::all(),
            'languages' => BaseLanguage::all()
        ];

        return view('library::books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $coverPath = null;
        $bookPath = null;

        try {
            DB::transaction(function () use ($validatedData, $request, &$coverPath, &$bookPath) {
                $coverPath = $request->file('cover_path')->store('covers', 'public');
                $bookPath = $request->file('book_path')->store('books', 'public');

                LibraryBookBook::create([
                    'name' => $validatedData['name'],
                    'writer' => $validatedData['writer'],
                    'publisher' => $validatedData['publisher'],
                    'isbn' => $validatedData['isbn'],
                    'publish_place' => $validatedData['publish_place'],
                    'publish_year' => $validatedData['publish_year'],
                    'publish_period' => $validatedData['publish_period'],
                    'internal_reference' => BaseSequence::getNextByCode('BOOK_SEQUENCE'),
                    'type' => $validatedData['type'],
                    'is_publish' => $validatedData['is_publish'],
                    'stock' => $validatedData['stock'],
                    'category_id' => $validatedData['category_id'],
                    'language_id' => $validatedData['language_id'],
                    'synopsis' => $validatedData['synopsis'],
                    'cover_path' => $coverPath,
                    'book_path' => $bookPath,
                ]);
            });

            toast(__('Book added successfully.'), 'success');
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            Log::error('Book creation failed: ' . $e->getMessage());

            if ($coverPath) {
                Storage::disk('public')->delete($coverPath);
            }
            if ($bookPath) {
                Storage::disk('public')->delete($bookPath);
            }

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
            'book' => $book,
            'categories' => LibraryBookCategory::all(),
            'languages' => BaseLanguage::all()
        ];

        $title = 'Delete Book!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('library::books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, LibraryBookBook $book): RedirectResponse
    {
        $validatedData = $request->validated();
        $coverPath = $book->cover_path;
        $bookPath = $book->book_path;


        try {
            DB::transaction(function () use ($validatedData, $request, $book, &$coverPath, &$bookPath) {
                if ($request->hasFile('cover_path')) {
                    if ($coverPath) {
                        Storage::disk('public')->delete($coverPath);
                    }
                    $coverPath = $request->file('cover_path')->store('covers', 'public');
                }

                if ($request->hasFile('book_path')) {
                    if ($bookPath) {
                        Storage::disk('public')->delete($bookPath);
                    }
                    $bookPath = $request->file('book_path')->store('books', 'public');
                }

                $book->update([
                    'name' => $validatedData['name'],
                    'writer' => $validatedData['writer'],
                    'publisher' => $validatedData['publisher'],
                    'isbn' => $validatedData['isbn'],
                    'publish_place' => $validatedData['publish_place'],
                    'publish_year' => $validatedData['publish_year'],
                    'publish_period' => $validatedData['publish_period'],
                    'type' => $validatedData['type'],
                    'is_publish' => $validatedData['is_publish'],
                    'stock' => $validatedData['stock'],
                    'category_id' => $validatedData['category_id'],
                    'language_id' => $validatedData['language_id'],
                    'synopsis' => $validatedData['synopsis'],
                    'cover_path' => $coverPath,
                    'book_path' => $bookPath,
                ]);
            });

            toast(__('Book updated successfully.'), 'success');
            return back();
        } catch (\Exception $e) {
            Log::error('Book update failed: ' . $e->getMessage());

            if ($coverPath && $coverPath !== $book->cover_path) {
                Storage::disk('public')->delete($coverPath);
            }
            if ($bookPath && $bookPath !== $book->book_path) {
                Storage::disk('public')->delete($bookPath);
            }

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
