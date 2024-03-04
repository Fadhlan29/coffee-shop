@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Orders</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order Code</th>
                        <th>Total Price</th>
                        <th>Payment</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ 1 }}</th>
                            <td>{{ $item->code }}</td>
                            <td>Rp. {{ money_format($item->total_price) }}</td>
                            <td>{{ $item->payment }}</td>
                            <td>{{ indonesian_date($item->created_at) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
