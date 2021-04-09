@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>
               
                <div class="card-body">
                <img src="{{asset('images')}}/{{$food->image}}" alt="" width="250">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Details') }}</div>

                <div class="card-body">
                  <p><h2>{{$food->name}}</h2></p>
                  <p class='lead'>{{$food->description}}</p>
                  <p><h4>{{$food->price}}tk</h4></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
