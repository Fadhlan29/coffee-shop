@extends('layouts.app')

@section('title', 'Orders')
@section('page_title', 'Create a new order')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="">List Product</label>
                            <select name="" id="id_list" class="form-control">
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}" data-name="{{ $item->name }}"
                                        data-price="{{ $item->price }}" data-id="{{ $item->id }}"> {{ $item->name }}
                                        Rp.{{ money_format($item->price) }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Customer Name</label>
                            <input type="text" name="customer" id="customer" class="form-control" placeholder="Enter Customer Name">
                        </div>
                        <div class="form-group">
                            <label for="">Payment Method</label>
                            <select name="payment" id="payment" class="form-control">
                                <option value="Transfer">Transfer</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button class="btn btn-primary d-block" onclick="addItem()" type="button">Add Item</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="order_item">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th class="qty">0</th>
                                    <th class="total_price" colspan="2"></th>
                                </tr>
                                <tr>
                                    <td colspan="3">Discount (10%)</td>
                                    <td class="discount">- Rp. 0</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="total_price" value="0">
                        <input type="hidden" name="discount" id="discount" value="0">
                        <button class="btn btn-success">
                            Save Order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var total_price = 0;
        var qty = 0;
        var list_item = [];

        function addItem() {
            updateTotalPrice(parseInt($('#id_list').find(':selected').data('price')))
            var itemIndex = list_item.findIndex(el => el.id === $('#id_list').find(':selected').data('id'));
            if (itemIndex !== -1) {
                list_item[itemIndex].qty += 1;
            } else {
                var newItem = {
                    id: $('#id_list').find(':selected').data('id'),
                    name: $('#id_list').find(':selected').data('name'),
                    price: $('#id_list').find(':selected').data('price'),
                    qty: 1
                };
                list_item.push(newItem);
            }

            updateQty(1);
            updateTable();
        }

        function updateTable() {
            var html = '';
            list_item.map((item, index) => {
                html += `
                    <tr>
                        <td>${index + 1}</td>    
                        <td>${item.name}</td>
                        <td>${item.qty}</td>
                        <td>Rp. ${item.price.toLocaleString()}</td>
                        <td>
                            <input type="hidden" name="id[]" value="${item.id}">    
                            <input type="hidden" name="qty[]" value="${item.qty}">
                            <button type="button" onclick="deleteItem(${index})" class="btn btn-link">
                                <i class="fas fa-fw fa-trash text-danger"></i>    
                            </button>
                        </td>
                    </tr>
                `
            })
            $('.order_item').html(html)
        }

        function deleteItem(index) {
            var item = list_item[index];
            if (item.qty > 1) {
                list_item[index].qty -= 1;
                updateTotalPrice(-(item.price))
                updateQty(-1);
            } else {
                list_item.splice(index, 1);
                updateTotalPrice(-(item.price * item.qty))
                updateQty(-(item.qty));
            }
            updateTable()
        }

        function updateTotalPrice(nom) {
            total_price += nom;

            var discount = 0;
            if (total_price > 100000) {
                discount = total_price * 0.1;
                total_price -= discount;
                $('#has_discount').val('true');
            } else {
                $('#has_discount').val('false');
            }

            $('[name=total_price]').val(total_price);
            $('.total_price').html('Rp.' + total_price.toLocaleString());

            $('[name=discount]').val(discount);
            $('.discount').html('- Rp.' + discount.toLocaleString());
        }

        function updateQty(nom) {
            qty += nom;
            $('.qty').html(qty.toLocaleString());
        }
    </script>
@endpush
