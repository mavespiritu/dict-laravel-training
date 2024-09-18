@extends('layouts.app')

@section('content')

<x-page-header title="Dashboard" />

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-4">
            <x-card
                backgroundColor="red-bg"
                icon="fa-bell"
                count="47"
                title="Notification"
                subTitle="We detect the error."
            />
        </div>
        <div class="col-md-4">
            <x-card
                backgroundColor="blue-bg"
                icon="fa-info"
                count="12"
                title="Information"
                subTitle="Details are here."
            />
        </div>
        <div class="col-md-4">
            <x-card
                backgroundColor="yellow-bg"
                icon="fa-check"
                count="24"
                title="Success"
                subTitle="Operation successful."
            />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <x-box>
                <x-slot name="boxtitle">
                    <h5>Report for 2024</h5>
                    <small>Company Financial Status</small>
                </x-slot>
                <x-slot name="boxcontent">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </x-slot>
                <x-slot name="boxfooter">
                    <button type="button" class="btn btn-primary">
                        Save
                    </button>
                </x-slot>
            </x-box>
        </div>
    </div>
</div>

@endsection