@extends('layouts.app')

@section('title', 'Products')
@section('page_title', 'Products')

@section('content')
    <!-- DataTables -->
    <div class="card shadow mb-4 p-3">
        <div class="pb-4">
            <form class="d-flex" action="{{ url('product') }}" method="get">
                <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}"
                    placeholder="Search Product" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>

        <div class="pb-2">
            <a href='{{ url('product/create') }}' class="btn btn-success">+ Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-3">Category</th>
                            <th class="col-md-3">Price</th>
                            <th class="col-md-2">Image</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>Rp. {{ money_format($item->price) }}</td>
                                <td><img src="{{ asset('images/products/' . $item->image) }}" alt="" width="50px"
                                        class="img-fluid"></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ url('product/' . $item->id . '/edit') }}"
                                            class="btn btn-primary btn-sm mr-2">Edit</a>
                                        <form onsubmit="return confirm('Are you sure to delete the data?')"
                                            action="{{ url('product/' . $item->id) }}" class="d-inline" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
@endsection
