@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8">

        <table style="border: 1px solid grey; margin-bottom: 10px; align=center">

            <tbody>
                
        </table>

    </div>


    <div class="col-md-4">
        <div class="container mt-5">
        <form action="#" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="sub_category_id">Sub Category ID</label>
        <input type="number" class="form-control" id="sub_category_id" name="sub_category_id" required>
    </div>
    <div class="form-group">
        <label for="product_code">Product Code</label>
        <input type="text" class="form-control" id="product_code" name="product_code" required>
    </div>
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>
    <div class="form-group">
        <label for="shop_id">Shop ID</label>
        <input type="text" class="form-control" id="shop_id" name="shop_id" required>
    </div>
    <div class="form-group">
        <label for="short_description">Short Description</label>
        <textarea class="form-control" id="short_description" name="short_description" rows="2"></textarea>
    </div>
    <div class="form-group">
        <label for="long_description">Long Description</label>
        <textarea class="form-control" id="long_description" name="long_description" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="product_slug">Product Slug</label>
        <input type="text" class="form-control" id="product_slug" name="product_slug">
    </div>
    <div class="form-group">
        <label for="product_qty">Product Quantity</label>
        <input type="number" class="form-control" id="product_qty" name="product_qty" required>
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" required>
    </div>
    <div class="form-group">
        <label for="product_status">Product Status</label>
        <input type="text" class="form-control" id="product_status" name="product_status" required>
    </div>
    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="file" class="form-control-file" id="product_image" name="product_image">
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

        </div>
    </div>
</div>

@endsection