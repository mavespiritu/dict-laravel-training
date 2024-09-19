<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/movies', [MovieController::class, 'index'])->name('page1');
Route::get('/books', [BookController::class, 'index'])->name('books');

Route::get('/page3', function () {
    return view('pages.page3');
});

Route::get('/page4', function () {
    return view('pages.page4-helper');
});

Route::get('/query-test', function () {
   
    $data = DB::select("select * from movies");

    $data = DB::table('movies')->get();
    $data = DB::table('movies')->where('id', 4)->get();
    $data = DB::table('movies')->where('id','>', 51)->get();
    $data = DB::table('movies')
            ->where('id','>', 51)
            ->where('star_rating','<', 3)
            ->get();

    $data = DB::table('movies')
            ->where('id','>', 50)
            ->whereOr('star_rating','<', 3)
            ->get();

    $data = DB::table('movies')
            ->whereBetween('date_published',['2020-01-01', '2023-01-01'])
            ->get();
        
    $data = DB::table('movies')
            ->whereBetween('date_published',['2020-01-01', '2023-01-01'])
            ->orderBy('title', 'asc')
            ->get();

    $data = DB::table('movies')
            ->select('title', 'star_rating')
            ->whereBetween('date_published',['2020-01-01', '2023-01-01'])
            ->orderBy('title', 'asc')
            ->get();

    $data = DB::table('movies')
            ->orderBy('title', 'asc')
            ->avg('star_rating');

    $data = DB::table('movies')
            ->orderBy('title', 'asc')
            ->sum('star_rating');

    $data = DB::table('movies')
            ->where([
                ['id', '>', 40],
                ['star_rating', '<', 3],
            ])
            ->get();

    
    $data = DB::table('movies')
            ->where('description','like', '%nostrum%')
            ->get();

    dd($data);
});

/* Route::get('/add-movies', function () {
   $query = DB::table('movies')
    ->insert([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'director' => $request->input('director'),
        'star_rating' => $request->input('star_rating'),
        'date_published' => $request->input('date_published'),
    ]);

    if(!$query){
        echo 'Error';
    }

    echo 'Saved';

    return view('pages.add-movie-form');
})->name('add-movies'); */

Route::get('/add-movies', [MovieController::class, 'create'])->name('add-movies');
Route::get('/edit-movies/{id}', [MovieController::class, 'edit'])->name('edit-movies');
Route::post('/save-movies', [MovieController::class, 'store'])->name('save-movies');
Route::post('/update-movies/{id}', [MovieController::class, 'update'])->name('update-movies');
Route::get('/delete-movies/{id}', [MovieController::class, 'destroy']);

Route::get('/add-books', [BookController::class, 'create'])->name('add-books');
Route::get('/edit-books/{id}', [BookController::class, 'edit'])->name('edit-books');
Route::post('/save-books', [BookController::class, 'store'])->name('save-books');
Route::post('/update-books/{id}', [BookController::class, 'update'])->name('update-books');
Route::delete('/delete-books/{id}', [BookController::class, 'destroy']);

/* Route::post('/save-movies', function (Request $request) {
    $query = DB::table('movies')
    ->insert([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'director' => $request->input('director'),
        'star_rating' => $request->input('star_rating'),
        'date_published' => $request->input('date_published'),
    ]);

    if(!$query){
        echo 'Error';
    }

    return redirect(url('/page1'))->with('success', 'Movie saved succcessfully');
    
})->name('save-movies'); */

/* Route::get('/update-movies', function () {
    $query = DB::table('movies')
    ->where('id', 1)
    ->update([
        'title' => fake()->sentence(),
        'description' => fake()->text(),
        'director' => fake()->name(),
        'star_rating' => random_int(1, 5),
        'date_published' => fake()->date()
    ]);

    if(!$query){
        echo 'Error';
    }

    echo 'Updated';
});

Route::get('/delete-movies', function () {
    $query = DB::table('movies')
    ->where('id', 1)
    ->delete();

    if(!$query){
        echo 'Error';
    }

    echo 'Deleted';
}); */

/* Route::get('/add-books', function () {
    $query = DB::table('books')
    ->insert([
        'title' => fake()->sentence(),
        'description' => fake()->text(),
        'country_id' => random_int(1, 100),
        'stocks' => random_int(1, 100),
        'amount' => fake()->randomFloat(2, 10, 100),
        'photo' => fake()->imageUrl()
    ]);

    if(!$query){
        echo 'Error';
    }

    echo 'Saved';
});
 */