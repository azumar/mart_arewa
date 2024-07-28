@extends('layouts.master')

@section('content')
   
<main class="container py-4">
    <div class="row">
      
      <div class="col-md-7 d-flex flex-wrap justify-content-center">
      @foreach ($categories  as $category)
     
      <a href="/category/{{$category->id}}"> <img src="/pictures/{{ $category->category_image }}" alt="Fabrics" class="img-thumbnail me-3 mb-3 product-image"> </a>
      @endforeach
      
      </div>
      <div class="col-md-3">
        <p> ArewaMart is your one-stop shop for everything you need, conveniently available in Hausa and Pidgin. We're bridging the language gap to make online shopping accessible for everyone.</p>
      </div>
    </div>
  </main>
@endsection
