<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sultan Bedding Back Office</title>

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
    
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/varian.css" rel="stylesheet">


     {{-- Jquery --}}
     <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>

     {{-- Trix --}}
      <link rel="stylesheet" type="text/css" href="/css/trix.css">
      <script type="text/javascript" src="/js/trix.js"></script>

      <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
          display:none;
        }

      </style>

  </head>
  <body>

@include('backoffice.layouts.header')



<div class="container-fluid">
  <div class="row">
    @include('backoffice.layouts.sidebar')    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>

    <script src="/js/slug.js"></script>
    <script src="/js/varian.js"></script>
    <script src="/js/previewImg.js"></script>

  </body>
</html>



