@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <restaurant-group :restaurants="{{json_encode($restaurants)}}"></restaurant-group>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <menu-container :items="{{json_encode($menus)}}" :resto-id="{{$restoId}}"></menu-container>
        </div>
    </div>
</div>
@endsection
