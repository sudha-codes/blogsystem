<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Blog System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- 🌈 Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✨ Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- 💎 Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f7f8fa;
    }
    .navbar {
      background: linear-gradient(90deg, #007bff, #6610f2);
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #ffe600 !important;
    }
    .card {
      border: none;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      border-radius: 12px;
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-4px);
    }
    footer {
      background: #212529;
      color: #ccc;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
    <div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">My Posts</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('tags.index') }}">Tags</a></li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<div class="container">@yield('content')</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
