<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Login Backoffice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <script src="/js/jquery-3.6.0.min.js"></script>
  
    

    

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="signin.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">


  </head>
  <body class="text-center">
  
  
    
<main class="form-signin w-100 m-auto">

  {{-- @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">

      </button>
    </div>
  @endif --}}

  @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">

      </button>
    </div>
  @endif
  <form action="/backoffice/login" method="post" class="myForm" autocomplete="off">
    @csrf
    <img class="mb-4" src="/foto/b-logo.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal myTitle">Backend Sultan Bedding</h1>

    <div class="form-floating">
      <input type="text" class="form-control mb-2 @error('username') is-invalid @enderror" id="username" name="username" autofocus placeholder="Username" required value="{{ old('username') }}">
      <label for="username">Username</label>
      @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control mb-4" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>

    
    <button class="w-100 btn btn-violet" type="submit">Login</button>
  </form>
  
  {{-- <small class="d-block mt-3">Not registered ? <a href="">Register Now!</a></small> --}}

</main>


<script src="/js/alerts.js"></script>
  </body>
</html>
