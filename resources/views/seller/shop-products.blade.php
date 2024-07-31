@extends('layouts.master')

@section('content')
<h6> Welcome back </h6>

<main class="container py-4">

    <div class="row">

        <div class="col-md-7">
            <h3> Products in shop ...</h3>

            <table class="table table-striped" style=align=center">

                <tbody>

                </tbody>
            </table>

        </div>

        <div class="col-md-3">
            <h5> Create new product</h5>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <select class="form-control" id="subCatId" name="subCatId">
    <option value="">-- Select sub category --</option>
        @foreach ($subCategories as $subCat )
        <option value="{{$subCat->id}}"> {{$subCat->sub_category_name}} </option>

        @endforeach
        </select>
       
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
      
        <input type="hidden" class="form-control" id="shop_id" name = "shop_id" value="{{$shop->id}}" required>
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
        <label for="product_qty">Product Quantity</label>
        <input type="number" class="form-control" id="product_qty" name="product_qty" required>
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" required>
    </div>
    
    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="file" class="form-control-file" id="product_image" name="product_image">
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

            
        </div>
    </div>

</main>
@endsection