@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <form action="{{route('checkout')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="seller_name"> Name</label>
                <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
            </div>
            <div class="form-group">
                <label for="seller_address">Buyer Address</label>
                <input type="text" class="form-control" id="buyer_address" name="buyer_address" required>
            </div>
            <div class="form-group">
                <label for="seller_contact">Buyer Contact</label>
                <input type="text" class="form-control" id="buyer_contact" name="buyer_contact" required>
            </div>
            <div class="form-group">
                <label for="seller_email">Buyer Email</label>
                <input type="email" class="form-control" id="buyer_email" name="buyer_email" required>
            </div>
            <div class="form-group">
                <label for="buyer_password">Buyer Password</label>
                <input type="password" class="form-control" id="buyer_password" name="buyer_password" required>
            </div>
            <div class="form-group">
                <label for="buyer_password_confirm">Confirm Password</label>
                <input type="password" class="form-control" id="buyer_password_confirm" name="buyer_password_confirm" required>
            </div>
           
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection
