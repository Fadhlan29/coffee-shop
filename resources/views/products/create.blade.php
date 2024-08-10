@extends('layouts.app')

@section('title', 'Products')
@section('page_title', 'Create a new product')

@section('content')
    <form action='{{ url('product') }}' method='post' enctype="multipart/form-data">
        @csrf
        <a href="{{ url('product') }}" class="btn btn-secondary">
            << Back</a>
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='name' id="name"
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category" id="category">
                                <option value="Coffee" {{ Session::get('category') === 'Coffee' ? 'selected' : '' }}>Coffee
                                </option>
                                <option value="Hot Coffee"
                                    {{ Session::get('category') === 'Hot Coffee' ? 'selected' : '' }}>Hot Coffee
                                </option>
                                <option value="Cool Coffee"
                                    {{ Session::get('category') === 'Cool Coffee' ? 'selected' : '' }}>Cool Coffee
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='price' id="price"
                                value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name='image' id="image"
                                value="{{ old('image') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">SAVE</button>
                        </div>
                    </div>
    </form>
@endsection
