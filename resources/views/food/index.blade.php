@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
                <div class="alert alert-success">
                 {{Session::get('message')}}
                </div>
             @endif
            <div class="card">
           
                <div class="card-header">{{ __('All Food ') }}
                    <span class=float-right>
                    <a href="{{route('food.create')}}" class="btn btn-outline-primary rounded">Add food</a>

                    </span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">image</th>
                                <th scope="col">name</th>
                                <th scope="col">category</th>
                                <th scope="col">description</th>
                                <th scope="col">price</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                        @if(count($foods)>0)
                        @foreach($foods as $key=>$food)
                            <tr>
                                <td><img style="height:100px" src="{{asset('images')}}/{{$food->image}}" alt=""></td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->relCategory->name}}</td>
                                <td>{{$food->description}}</td>
                                <td>{{$food->price}}tk</td>
                                <td>
                                    <a href="{{route('food.edit',$food->id)}}">
                                        <button class="btn btn-outline-success">EDIT</button>
                                    </a>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$food->id}}">
                                    DELETE
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('food.destroy',$food->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-outline-danger">Yes!</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </td>



                            </tr>
                            @endforeach
                        @else<td>No food to display</td>
                        @endif
                        </tbody>
                       
                    </table>
                   <div> {{$foods->links()}}</div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection
