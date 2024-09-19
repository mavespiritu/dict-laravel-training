<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('books')->get();

        return view('pages.books.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];

        return view('pages.books.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = DB::table('books')
            ->insert([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'country_id' => $request->input('country_id'),
                'stocks' => $request->input('stocks'),
                'amount' => $request->input('amount'),
                'photo' => $request->input('photo'),
            ]);

            if(!$query){
                echo 'Error';
            }

            return redirect(url('/books'))->with('success', 'Book saved succcessfully');
            //return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('books')
            ->where('id', $id)
            ->first();

        return view('pages.books.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $query = DB::table('books')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'country_id' => $request->input('country_id'),
                'stocks' => $request->input('stocks'),
                'amount' => $request->input('amount'),
                'photo' => $request->input('photo'),
            ]);

            if(!$query){
                echo 'Error';
            }

            return redirect(url('/books'))->with('success', 'Book updated succcessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('books')
            ->where('id', $id)
            ->delete();

            if(!$query){
                echo 'Error';
            }

            return redirect(url('/books'))->with('success', 'Book deleted succcessfully');
    }
}
