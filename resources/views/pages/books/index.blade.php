@extends('layouts.app')

@section('content')

@if (Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if (Session::has('error'))
    <p class="alert alert-danger">Error</p>
@endif

<x-page-header title="List of Books" />

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <a href="{{ route('add-books') }}" class="btn btn-primary pull-right">Add Book</a>
        <div class="clearfix"></div>
        <br>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>COUNTRY ID</th>
                <th>STOCKS</th>
                <th>AMOUNT</th>
                <th>PHOTO</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->title }}</td>
                    <td>{{ $d->description }}</td>
                    <td>{{ $d->country_id }}</td>
                    <td>{{ $d->stocks }}</td>
                    <td>{{ number_format($d->amount, 2) }}</td>
                    <td><img src="{{ $d->photo }}" style="height: auto; width: 20%" /></td>
                    <td>
                        <a href="{{ url('/edit-books/'.$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <form action="{{ url('/delete-books/'.$d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
