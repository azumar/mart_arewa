@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Left side: Cart details -->
            <div class="col-md-8">
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
                        @php $total = 0; @endphp
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

            <!-- Right side: User details / Login / Register -->
            <div class="col-md-4">
                @auth
                    <h2>Your Details</h2>
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p><a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a></p>
                @else
                    <h2>Account</h2>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingLogin">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogin" aria-expanded="true" aria-controls="collapseLogin">
                                    Existing User? Login
                                </button>
                            </h2>
                            <div id="collapseLogin" class="accordion-collapse collapse show" aria-labelledby="headingLogin" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingRegister">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRegister" aria-expanded="false" aria-controls="collapseRegister">
                                    New User? Register
                                </button>
                            </h2>
                            <div id="collapseRegister" class="accordion-collapse collapse" aria-labelledby="headingRegister" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('buyers.registration') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="buyer_name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="buyer_email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="buyer_email" name="buyer_email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="buyer_password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="buyer_password" name="buyer_password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="buyer_password_confirm" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="buyer_password_confirm" name="buyer_password_confirm" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
