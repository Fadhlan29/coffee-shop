@extends('layouts.app')

@section('title', 'Orders')
@section('page_title', 'Orders')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transaction Code</th>
                        <th>Admin</th>
                        <th>Customer Name</th>
                        <th>Total Price</th>
                        <th>Total Discount</th>
                        <th>Payment Method</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->customer }}</td>
                            <td>Rp. {{ money_format($item->total_price) }}</td>
                            <td>Rp. {{ money_format($item->discount) }}</td>
                            <td>{{ $item->payment }}</td>
                            <td>{{ indonesian_date($item->created_at) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
