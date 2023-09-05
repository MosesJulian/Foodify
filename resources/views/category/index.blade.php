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
                <div class="card-header">
                    All Category
                    <span class="float-right">
                        <a href="{{route('category.create')}}">
                            <button class="btn btn-outline-secondary">Add Category</button>
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories) > 0)
                            @foreach($categories as $key=>$category)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category.edit', [$category->id])}}">
                                        <button class="btn btn-outline-success">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{route('category.destroy', [$category->id])}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button data-bs-dismiss="modal" type="button" class="btn btn-secondary">
                                                            Close
                                                        </button>

                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td>No category to display</td>
                            @endif
                        </tbody>
                    </table>
                    <a href="{{route('category.create')}}" class="btn btn-success">Create</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
