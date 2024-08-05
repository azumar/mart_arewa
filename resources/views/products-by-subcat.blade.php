@extends('layouts.master')

@section('content')
<h6> Welcome back </h6>

<main class="container py-4">

    <div class="row">

        <div class="col-md-7">
            <h3> Products in the shop ...</h3>

            <table class="table table-striped" style=align=center">
                <thead>
                    <th></th>
                    <th>Code </th>
                    <th>Name</th>
                    <th>Description </th>
                    <th>Available</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td rowspan="2">

                                <a href="/product/{{$product->id}}"> <img src="/products/{{ $product->product_image }}"
                                        style="width:80px;margin-top: 0px;"></a>
                            </td>
                            <td>
                                {{$product->product_code}}
                            </td>
                            <td>
                                {{$product->product_name}}
                            </td>
                            <td>
                                {{$product->short_description}}
                            </td>
                            <td>
                                {{$product->product_qty}}
                            </td>
                            <td>
                                {{$product->product_price}}
                            </td>
                            <td>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity"   min="1" value="1">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>

        <div class="col-md-3">


        </div>
    </div>

</main>
@endsection