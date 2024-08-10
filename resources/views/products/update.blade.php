@extends('layouts.app')

@section('title', 'Products')
@section('page_title', 'Update Product')

@section('content')
    <form action='{{ url('product/' . $data->id) }}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('product') }}" class="btn btn-secondary">
                << Back</a>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='name' id="name"
                                value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category" id="category">
                                <option value="Coffee" {{ $data->category === 'Coffee' ? 'selected' : '' }}>Coffee</option>
                                <option value="Hot Coffee" {{ $data->category === 'Hot Coffee' ? 'selected' : '' }}>Hot
                                    Coffee</option>
                                <option value="Cool Coffee" {{ $data->category === 'Cool Coffee' ? 'selected' : '' }}>Cool
                                    Coffee</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='price' id="price"
                                value="{{ $data->price }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">SAVE</button>
                        </div>
                    </div>
    </form>
@endsection
