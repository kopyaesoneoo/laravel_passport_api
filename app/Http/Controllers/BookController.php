<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return response()->json([
            'success' => true,
            'user' => $books
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | min:5',
            'decreption' => 'required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $book = new Book();
        $book->name = $request->name;
        $book->decreption = $request->decreption;
        $book->save();

        return 'Book Create Successfully';
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | min:5',
            'decreption' => 'required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $book = Book::find($id);
        $book->name = $request->name;
        $book->decreption = $request->decreption;
        $book->save();

        return $book;
    }
    public function show($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return 'Book not Found';
        }
        return $book;
    }
    public function destroy(Book $book,$id)
    {   
        $book = Book::find($id);
        $book->delete();
        return "delete Success";
    }
}
