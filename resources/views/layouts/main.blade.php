<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sultan Bedding | {{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

   
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/slider.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/sidebars.css" rel="stylesheet">
  </head>
  <body>
    
    

  {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> --}}
  {{-- <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div> --}}
</header>

<div class="container-fluid">
  <div class="row">
    
    <div class="mySidebar">
      <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar mySidebar">
        <a href="/" class="mySidebar-partials">
          <img src="/foto/logov3.png" class="rounded mx-auto d-block" width="200px" alt="">
        </a>
  
  
        <div class="position-sticky pt-3 responsive-content">
  
          {{-- @include('partials.menu-toggle') --}}
          
          <div class="mySidebar-partials">
            @include('partials.search')
  
            @include('partials.menu')
  
            @include('partials.info')
          </div>
         
        
        
        </div>
      </nav>
    </div>

   
    <div class="container tabletContainer">
      @yield('container')
    </div>
    

    </div>




    
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    <script src="/js/dashboard.js"></script>
    <script src="/js/slider.js"></script>
  </body>
</html>
