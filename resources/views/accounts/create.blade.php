@extends('layouts.dashboard')

@section('title', 'Add New Product')

@section('content')
    <form action='{{ url('account') }}' method='post'>
        @csrf
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
                <label for="category" class="col-sm-2 col-form-label">Category</label>
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
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
    </form>
@endsection
