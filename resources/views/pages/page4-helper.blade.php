@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>This is Page 4</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">This is</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Breadcrumb</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content">
    @php
        $salary = 100000.789
    @endphp

    <p>{{ Number::format($salary) }}</p>
    <p>{{ Number::format($salary, 2) }}</p>
    <p>{{ Number::format($salary, precision: 2) }}</p>
    <p>{{ Number::format($salary, maxPrecision: 2) }}</p>
    <p>{{ Number::ordinal(22) }}</p>
    <p>{{ Number::percentage(21) }} remaining</p>
    <p>{{ Number::spell(21112.23) }} remaining</p>

    @php
        $fname = 'Nerison';
        $mname = 'Sayson';
        $lname = 'Pitogo';
        $suffix = 'Jr.';
    @endphp

    <p>Full Name: {{ format_fullname($fname, $mname, $lname, $suffix, 1, 1) }}</p>
    <p>Full Name: {{ format_fullname($fname, $mname, $lname, $suffix, 1, 0) }}</p>
    <p>Full Name: {{ format_fullname($fname, $mname, $lname, $suffix, 0, 0) }}</p>
    <p>Full Name: {{ format_fullname($fname, $mname, $lname, $suffix, 0, 1) }}</p>

    <h3>Dates:</h3>
    <p>Format 1: {{ format_report_date("2024-09-17", 1) }}</p>
    <p>Format 2: {{ format_report_date("2024-09-17", 2) }}</p>
    <p>Format 3: {{ format_report_date("2024-09-17", 3) }}</p>
    <p>Format 4: {{ format_report_date("2024-09-17", 4) }}</p>
</div>

@endsection