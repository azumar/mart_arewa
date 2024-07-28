<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArewaMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/amart.css') }}">
</head>
<body>
  <header >
    <div class="row">
      <h3 class="col-6">ArewaMart</h3>  
      <div class="col-6 text-end d-flex align-items-center justify-content-end">
        <span class="me-3">Hausa/English</span>
        <i class="fas fa-user me-3"></i> 
      </div>
    </div>
  </header>

  <nav class="container-fluid bg-light py-2">

    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Products
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Books</a></li>
          <li><a class="dropdown-item" href="#">Fabrics</a></li>
          <li><a class="dropdown-item" href="#">Leather</a></li>
          <li><a class="dropdown-item" href="#">Gold</a></li>
        </ul>
      </li>
    </ul>

  </nav>

  <main class="container py-4">
    <div class="row">
      
      <div class="col-md-8 d-flex flex-wrap justify-content-center">
        <img src="[Image of Book]" alt="Books" class="img-thumbnail me-3 mb-3 product-image">
        <img src="[Image of Fabric]" alt="Fabrics" class="img-thumbnail me-3 mb-3 product-image">
        <img src="[Image of Leather]" alt="Leather" class="img-thumbnail me-3 mb-3 product-image">
        <img src="[Image of Gold]" alt="Gold" class="img-thumbnail me-3 mb-3 product-image">
        
      </div>
      <div class="col-md-3">
        <p> ArewaMart is your one-stop shop for everything you need, conveniently available in Hausa and Pidgin. We're bridging the language gap to make online shopping accessible for everyone.</p>
      </div>
    </div>
  </main>

  <footer class="afooter">
  <p style="text-align: center;">Copyright © 2024 ArewaMart</p>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
