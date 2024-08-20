<!-- resources/views/cart/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @forelse($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td>#{{ $item['price'] }}</td>
                        <td>#{{ $subtotal }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Your cart is empty.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if(count($cart) > 0)
            <div class="text-right">
                <h3>Total: #{{ $total }}</h3>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Checkout</button>
                </form>
            </div>
        @endif
    </div>
@endsection
