@extends('layouts.app')

@section('title', 'Accounts')
@section('page_title', 'Update Account')

@section('content')
    <form action='{{ url('account/' . $data->id) }}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' id="name" value="{{ $data->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id="email" value="{{ $data->email }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name='image' id="image" value="{{ $data->image }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='phone' id="phone" value="{{ $data->phone }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='address' id="address" value="{{ $data->address }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="category" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role" id="role">
                        <option value="owner" {{ $data->role === 'owner' ? 'selected' : '' }}>Owner
                        </option>
                        <option value="admin" {{ $data->role === 'admin' ? 'selected' : '' }}>Admin
                        </option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">SAVE</button>
                </div>
            </div>
    </form>
@endsection
