@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <form action="{{route('seller.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="seller_name">Seller Name</label>
                <input type="text" class="form-control" id="seller_name" name="seller_name" required>
            </div>
            <div class="form-group">
                <label for="seller_address">Seller Address</label>
                <input type="text" class="form-control" id="seller_address" name="seller_address" required>
            </div>
            <div class="form-group">
                <label for="seller_contact">Seller Contact</label>
                <input type="text" class="form-control" id="seller_contact" name="seller_contact" required>
            </div>
            <div class="form-group">
                <label for="seller_email">Seller Email</label>
                <input type="email" class="form-control" id="seller_email" name="seller_email" required>
            </div>
            <div class="form-group">
                <label for="seller_password">Seller Password</label>
                <input type="password" class="form-control" id="seller_password" name="seller_password" required>
            </div>
            <div class="form-group">
                <label for="seller_password_confirm">Confirm Password</label>
                <input type="password" class="form-control" id="seller_password_confirm" name="seller_password_confirm" required>
            </div>
           
            <button type="submit" class="btn btn-primary">Create Seller</button>
        </form>
    </div>
</div>
@endsection
