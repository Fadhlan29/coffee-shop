@extends('layouts.dashboard')

@section('title', 'Products')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Products</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 p-3">
        <div class="pb-3">
            <form class="d-flex" action="{{ url('product') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Search Product" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>

        <div class="pb-3">
            <a href='{{ url('product/create') }}' class="btn btn-primary">+ Add New</a>
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
                        <?php $index = $products->firstItem() ?>
                        @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->price }}</td>
                                <td><img src="{{ asset('images/products/'.$item->image) }}" alt="" width="50px" class="img-fluid"></td>
                                <td class="d-flex">
                                    <a href="{{ url('product/' . $item->id . '/edit') }}"
                                        class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form onsubmit="return confirm('Are you sure to delete the data?')"
                                        action="{{ url('product/' . $item->name) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <?php $index++ ?>
                    </tbody>
                </table>
                {{ $products->links() }}    
            </div>
        </div>
    </div>
@endsection
