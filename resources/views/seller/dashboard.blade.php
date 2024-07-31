@extends('layouts.master')

@section('content')
<h6> Welcome back {{$seller->seller_name}}</h6>

<main class="container py-4">

    <div class="row">

        <div class="col-md-7">
            <h3> My shops</h3>

            <table class = "table table-striped" style=align=center">

                <tbody>
                    <th>Name</th> <th>Description</th> <th>Location</th> <th>Products</th>
                    @foreach ($seller->shops as $shop)
                    <tr>
                        <td>{{$shop->shop_name}}</td>
                        <td>{{$shop->shop_description}}</td>
                        <td>{{$shop->shop_location}}</td>
                        <td><a href="/seller_shops/{{$shop->id}}"> Products </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="col-md-3">
        <h5> Create new shop</h5>
        <form action="{{ route('seller_shops.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <input type="hidden" id="seller_id" name="seller_id" value="{{ $seller->id }}" required>

    </div>
    <div class="form-group">
        <label for="shop_name">Shop Name</label>
        <input type="text" class="form-control" id="shop_name" name="shop_name" required>
    </div>
    <div class="form-group">
        <label for="shop_description">Shop Description</label>
        <textarea class="form-control" id="shop_description" name="shop_description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="shop_location">Shop Location</label>
        <input type="text" class="form-control" id="shop_location" name="shop_location" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Shop</button>
</form>


        </div>
    </div>

</main>
@endsection