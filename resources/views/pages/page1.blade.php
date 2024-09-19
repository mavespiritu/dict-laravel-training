@extends('layouts.app')

@section('content')

@if (Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if (Session::has('error'))
    <p class="alert alert-danger">Error</p>
@endif

<x-page-header title="List of Movies" />

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <a href="{{ route('add-movies') }}" class="btn btn-primary">Add Movie</a>
            <img src="https://quickchart.io/chart?cht=p3&chs=350x200&chd=t:20%,30%,50%&chl=Horror|Action|Love story" width="100%">
        </div>
        <div class="col-md-9 col-xs-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>ID</th>
                    <th>CATEGORY</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>STAR RATING</th>
                    <th>DATE PUBLISHED</th>
                    <th>DIRECTOR</th>
                    <th>IMAGE</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @forelse($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->category }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->star_rating }}</td>
                        <td>{{ $d->date_published }}</td>
                        <td>{{ $d->director }}</td>
                        <td><img src="{{ asset('_uploads/'.$d->image) }}" alt="" width=50 /></td>
                        <td>
                            <a href="{{ url('/edit-movies/'.$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="{{ url('/delete-movies/'.$d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan=8>No records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection