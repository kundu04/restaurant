@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
            <div class="alert alert-success">
            {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
           
            <div class="card-header">{{ __('All Food Category') }} 
            <span class="float-right">
            <a href="{{route('category.create')}}" class="btn btn-outline-primary rounded">Add Category</a>

            </span>
            </div>
            <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                @if(count($categories)>0)
                @foreach($categories as $key=>$category)
                <tbody>
                    <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$category->name}}</td>
                    <td><a href="{{route('category.edit',$category->id)}}"><button class="btn btn-outline-success">EDIT</button></a>
                    </td>
                    <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                    DELETE
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('category.destroy',$category->id)}}" method="post">
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
                </tbody>
                @endforeach
                @else<td>No Category to display</td>
                @endif
            </table>
           <div> {{$categories->links()}}</div>
            </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
