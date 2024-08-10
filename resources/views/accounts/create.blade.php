@extends('layouts.app')

@section('title', 'Accounts')
@section('page_title', 'Create a new account')

@section('content')
    <form action='{{ url('account') }}' method='post' enctype="multipart/form-data">
        @csrf
        <a href="{{ url('account') }}" class="btn btn-secondary">
            << Back</a>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' id="name"
                        value="{{ Session::get('name') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name='email' id="email"
                        value="{{ Session::get('email') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name='password' id="password"
                        value="{{ Session::get('password') }}">
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
                <label for="name" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='phone' id="phone"
                        value="{{ Session::get('phone') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='address' id="address"
                        value="{{ Session::get('address') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="category" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role" id="role">
                        <option value="owner" {{ Session::get('role') === 'owner' ? 'selected' : '' }}>Owner
                        </option>
                        <option value="admin" {{ Session::get('role') === 'admin' ? 'selected' : '' }}>Admin
                        </option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">SAVE</button></div>
            </div>
        </div>
    </form>
@endsection
