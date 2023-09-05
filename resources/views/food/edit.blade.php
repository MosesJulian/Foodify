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
            <form action="{{route('food.update', [$food->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card">
                    <div class="card-header">Update food</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$food->name}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror">{{$food->desc}}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$food->price}}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}" @if($category->id==$food->category_id) selected @endif>
                                      {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
