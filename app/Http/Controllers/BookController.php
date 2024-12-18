<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import model Book

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all(); // Lấy tất cả sách
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create'); // Hiển thị form tạo sách
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            // ... các trường khác nếu cần
        ]);

        // Tạo mới sách
        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Thêm sách thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id); // Tìm sách hoặc báo lỗi 404
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id); // Tìm sách hoặc báo lỗi 404
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            // ... các trường khác nếu cần
        ]);

        $book = Book::findOrFail($id); // Tìm sách hoặc báo lỗi 404
        $book->update($request->all()); // Cập nhật sách

        return redirect()->route('books.index')
            ->with('success', 'Cập nhật sách thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id); // Tìm sách hoặc báo lỗi 404
        $book->delete(); // Xóa sách

        return redirect()->route('books.index')
            ->with('success', 'Xóa sách thành công.');
    }
}
