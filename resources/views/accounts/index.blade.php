@extends('layouts.app')

@section('title', 'Accounts')
@section('page_title', 'Accounts')

@section('content')
    <div class="card shadow mb-4 p-3">
        <div class="pb-4">
            <form class="d-flex" action="{{ url('account') }}" method="get">
                <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}"
                    placeholder="Search Product" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>

        <div class="pb-2">
            <a href='{{ url('account/create') }}' class="btn btn-success">+ Add New Account</a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div
                            class="card bg-light d-flex flex-fill">
                            <div
                                class="card-header {{ $item->role == 'owner' ? 'bg-warning' : 'bg-secondary' }} text-muted">
                                {{ ucfirst(trans($item->role)) }}
                            </div>
                            <div class="card-body pt-2 ">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $item->name }}</b></h2>
                                        {{-- <p class="text-muted text-sm"><b>Email: </b>{{ $item->email }}</p> --}}
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small my-3"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span>
                                                Address: {{ $item->address }}</li>
                                            <li class="small mb-3"><span class="fa-li"><i
                                                        class="fas fa-lg fa-envelope"></i></span>
                                                Email: {{ $item->email }}</li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span>
                                                Phone
                                                #: {{ $item->phone }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-3 offset-2 text-center" style="height: 130px">
                                        <img src="{{ asset('images/users/' . $item->image) }}" alt="profile-image"
                                            class="img-rounded" width="100%" height="100%"
                                            style="object-fit: contain; object-position: top;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="{{ url('account/' . $item->id . '/edit') }}"
                                        class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form action="{{ url('account/' . $item->id) }}" class="d-inline" method="post"
                                        onsubmit="return confirm('Are you sure to delete the data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
