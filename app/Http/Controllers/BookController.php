<?php

namespace App\Http\Controllers;

use App\DataTables\BookDataTable;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render('dashboard.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.book.create', [
            'categories' => Category::orderByDesc('created_at')->pluck('name', 'id'),
            'publishers' => Publisher::orderByDesc('created_at')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        try {
            $book = \App\Models\Book::create($request->validated());
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to store data: ' . $th->getMessage());
        }

        try {
            if ($request->hasFile('cover')) {
                $request->validate([
                    'cover' => ['image', 'max:2048'],
                ]);

                $book->update([
                    'cover' => $request->file('cover')->storePublicly('/'),
                ]);
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'The book stored successfully, but the system failed to store the cover: ' . $th->getMessage());
        }

        return back()->with('success', 'Data stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('dashboard.book.view', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.book.edit', [
            'book' => $book,
            'categories' => Category::orderByDesc('created_at')->pluck('name', 'id'),
            'publishers' => Publisher::orderByDesc('created_at')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            $book->update($request->validated());
        } catch (\Throwable $th) {
            return back()->with('error', 'Filed to update the data: ' . $th->getMessage());
        }

        try {
            if ($request->hasFile('cover')) {
                $request->validate([
                    'cover' => ['image', 'max:2048'],
                ]);

                $book->update([
                    'cover' => $request->file('cover')->storePublicly('/'),
                ]);
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'The book update succeed, but the system failed to update the cover: ' . $th->getMessage());
        }

        return back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete the data: ' . $th->getMessage());
        }

        return back()->with('success', 'Data deleted successfully');
    }
}
