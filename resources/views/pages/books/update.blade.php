@extends('layouts.app')

@section('content')

<x-page-header title="Edit Book Form" />

<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-md-4 .col-xs-12">
                @include('pages.books.form', [
                    'actionUrl' => '/update-books/' . $data->id,
                    'method' => 'POST',
                    'submitButtonText' => 'Update',
                    'data' => $data
                ])
            </div>
        </div>
    </div>
</div>

@endsection