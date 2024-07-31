<nav class="container-fluid bg-light py-2">

  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="{{route('general.home')}}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="{{route('get.categories')}}" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Categories
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($categories as $category)
      <li>
        <a class="dropdown-item" href="/category/{{$category->id}}">{{$category->category_code}}</a>
      </li>
    @endforeach
      </ul>

    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="{{route('get.categories')}}" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Management
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{route('add.categories')}}">Manage categories</a></li>

        <li><a class="dropdown-item" href="{{route('get.product-form')}}">Manage products</a></li>
        <li><a class="dropdown-item" href="{{route('user_list')}}">User management</a></li>

        <li><a class="dropdown-item" href="{{route('role')}}">Role management</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Seller
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="{{route('seller.home')}}">login</a></li>
      <li><a class="dropdown-item" href="#">Upload/update profile picture</a></li>
      <li><a class="dropdown-item" href="#">Change password</a></li>
        <li><a class="dropdown-item" href="#">Shops</a></li>


        <li><a class="dropdown-item" href="{{route('get.product-form')}}">Manage Listing</a></li>

      </ul>
    </li>
    <li class="nav-item">
    <li><a class="dropdown-item" href="{{route('get.sellerForm')}}">Seller registration</a></li>
    </li>
    @if(!Auth::guest())
    <li class="nav-item">
      <a class="nav-link" href="/logout" style="color: blue;">Logout</a>
    </li>
  @endif
    @if(Auth::guest())
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"
      style="color: blue;">Login</a>
      <ul class="dropdown-menu dropdown-menu-end"> <!-- Right-aligned dropdown -->
      <li><a class="dropdown-item" href="#">Student Login</a></li>
      
      </ul>
    </li>
  @endif
  </ul>

</nav>