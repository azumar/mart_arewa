@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <div class="row">

            <div class="col">
                <img src="/products/{{ $product->product_image }}" style="width:240px;margin-top: 0px;"></a>

            </div>

            <div class="col">
                <h5>Name: {{$product->short_description}} </h5>
                <h5>Code: {{$product->product_code}} </h5>
                <h5>Name: {{$product->product_name}} </h5>
                <h5>Price: {{$product->product_price}} </h5>
                <h5>In Stock: {{$product->product_qty}} </h5>

            </div>
        </div>
        <div class="row">
            {{$product->long_description}}
        </div>

    </div>
</div>
@endsection