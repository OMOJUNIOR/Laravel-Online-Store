<!doctype html> <html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
crossorigin="anonymous" />
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet" /> <title>@yield('title', 'Admin - Online Store')</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
<div class="row g-0">
<!-- sidebar -->
<div class="fixed p-3 text-white col bg-dark">
<a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none"> <span class="fs-4">Admin Panel</span>
</a> <hr />
<ul class="nav flex-column">
<li><a href="{{ route('admin.home.index') }}" class="text-white nav-link"> Home</a></li>
<li><a href="{{ route('admin.products.index') }}" class="text-white nav-link">Products</a></li>
<li><a href="{{ route('admin.products.add') }}" class="text-white nav-link"> Add Product</a></li>
<li>
<a href="{{ route('home.index') }}" class="mt-2 text-white btn bg-primary">Return to home page</a> </li>
</ul> </div>
<!-- sidebar -->
<div class="col content-grey">
<nav class="p-3 shadow text-end">
<div x-data="{ open: false }">
<img @click="open = ! open" class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}"> 

   <span> <a  x-show="open" @click.outside="open = false" class="dropdown-item" href="#">Settings</a></span>
   <form x-show="open" @click.outside="open = false"  id="logout" action="{{ route('logout') }}" method="POST">
    @csrf
    <a role="button" class="dropdown-item" onclick="document.getElementById('logout').submit();">Logout</a>
 </form>
</div>
</nav>
<div class="m-5 g-0"> @yield('content')
</div> </div>
</div>
<!-- footer -->
<div class="py-4 text-center text-white copyright"> <div class="container">
<small>
Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
href="#">
Omo Junior </a>
</small> </div>
</div>
<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script> 
</body>
</html>