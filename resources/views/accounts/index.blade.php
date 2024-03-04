@extends('layouts.dashboard')

@section('title', 'Products')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Accounts</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 p-3">
        <div class="pb-3">
            <form class="d-flex" action="{{ url('account') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Search Product" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>

        <div class="pb-3">
            <a href='{{ url('account/create') }}' class="btn btn-primary">+ Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-3">Email</th>
                            <th class="col-md-3">Role</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = $data->firstItem() ?>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="d-flex">
                                    <a href="{{ url('product/' . $item->id . '/edit') }}"
                                        class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form onsubmit="return confirm('Are you sure to delete the data?')"
                                        action="{{ url('account/' . $item->name) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $index++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}    
            </div>
        </div>
    </div>
@endsection
