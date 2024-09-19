@extends('layouts.app')

@section('content')

<x-page-header title="Add Movie Form" />

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-4 .col-xs-12">
            <form method="POST" action="/save-movies" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">SELECT ONE</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" id="title" />
                    @error('title')
                        <div class="alert alert-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id="description" />
                </div>

                <div class="form-group">
                    <label for="">Star Rating</label>
                    <input type="text" class="form-control" name="star_rating" id="star_rating" />
                    @error('star_rating')
                        <div class="alert alert-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Director</label>
                    <input type="text" class="form-control" name="director" id="director" />
                </div>

                <div class="form-group">
                    <label for="">Date Published</label>
                    <input type="date" class="form-control" name="date_published" id="date_published" />
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" id="image" />
                    @error('image')
                        <div class="alert alert-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
</div>

@endsection