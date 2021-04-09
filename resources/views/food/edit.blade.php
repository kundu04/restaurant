@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Food ') }}</div>
                <form action="{{route('food.update',$food->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$food->name}}" class="form-control @error('name') is-invalid @enderror" >
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   </div>

                   <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category_id"  class="form-control @error('category') is-invalid @enderror" >
                        <option value="">Select Category Name</option>                      
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id==$food->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                        @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </select>
                   </div>

                   <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description"  class="form-control @error('description') is-invalid @enderror"> {{$food->description}}</textarea>
                            @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        
                   </div>

                   <div class="form-group">
                        <label for="description">Price</label>
                        <input type="number" name="price" value="{{$food->price}}" step=".01" class="form-control @error('price') is-invalid @enderror" >
                        @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   </div>

                   <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" value="" class="form-control " >
                        @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   </div>
                   <div class="form-group">
                       <button class="btn btn-primary">Submit</button>
                   </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
