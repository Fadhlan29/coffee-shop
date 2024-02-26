@extends('layouts.app')

@section('content')
    <section class="row">
        <form class="col-4 mx-auto max-h-100 d-flex flex-column border p-5 mt-5" method="POST">
            @csrf
            <h4 class="mb-4 text-uppercase fw-bold">Login</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" placeholder="Enter Email" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input value="{{ old('password') }}" type="password" class="form-control" id="password" name="password" placeholder="Enter Password" >
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </section>
@endsection
