<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(){

        $data = DB::table('movies')
                ->select('movies.*', 'categories.category')
                ->leftJoin('categories', 'categories.id', '=', 'movies.category_id')
                ->get();

        return view('pages.page1', compact('data'));
    }

    public function create(){

        $categories = DB::table('categories')->get();

        return view('pages.add-movie-form', compact('categories'));

    }

    public function store(Request $request){

        $filename = null;

        $request->validate([
            'title' => 'required|string|max:100',
            'star_rating' => 'required|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // get the file name
            $file->move(public_path('_uploads'), $filename); // save to folder
        }

        //print_r($file);

        $query = DB::table('movies')
            ->insert([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'director' => $request->input('director'),
                'star_rating' => $request->input('star_rating'),
                'date_published' => $request->input('date_published'),
                'image' => $filename,
                'category_id' => $request->input('category_id'),
            ]);

            if(!$query){
                echo 'Error';
            }

            return redirect(url('/movies'))->with('success', 'Movie saved succcessfully');

    }

    public function edit($id){

        $data = DB::table('movies')
            ->select('movies.*', 'categories.category')
            ->leftJoin('categories', 'categories.id', '=', 'movies.category_id')
            ->where('movies.id', $id)
            ->first();

        $categories = DB::table('categories')->get();

        return view('pages.update-movie-form', compact('data', 'categories'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|string|max:100',
            'star_rating' => 'required|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $query = DB::table('movies')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'director' => $request->input('director'),
                'star_rating' => $request->input('star_rating'),
                'date_published' => $request->input('date_published'),
                'category_id' => $request->input('category_id'),
            ]);

            if(!$query){
                echo 'Error';
            }

            return redirect(url('/movies'))->with('success', 'Movie updated succcessfully');

    }

    public function destroy($id){

        $query = DB::table('movies')
            ->where('id', $id)
            ->delete();

            if(!$query){
                echo 'Error';
            }

            return redirect(url('/movies'))->with('success', 'Movie deleted succcessfully');
    }
}
