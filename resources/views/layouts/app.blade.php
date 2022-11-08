<html lang="en"> <head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" /> <title>@yield('title', 'Online Store')</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 @vite('resources/css/app.css')
 <link href="/css/app.css" rel="stylesheet">
  @livewireStyles
</head>
 <body class="bg-gray-50">
<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<div class="container">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
<a class="navbar-brand" href="{{route('home.index')}}">Online Store</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="navbar-nav ms-auto">
<a class="nav-link active" href="{{route('home.index')}}">Home</a>
<a class="nav-link active" href="{{route('product.index')}}">Product</a>
<a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
<a class="nav-link active" href="{{ route('myaccount.myAccount') }}">My Orders</a>
<a class="nav-link active" href="{{route('home.about')}}">About</a> 
<a class="nav-link active" href="{{route('home.contact')}}">Contact</a>
<div class="mx-2 bg-white vr d-none d-lg-block"></div>
@guest
<a class="nav-link active" href="{{ route('login') }}">Login</a>
<a class="nav-link active" href="{{ route('register') }}">Register</a> @else
<form id="logout" action="{{ route('logout') }}" method="POST">
<a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
@csrf </form>
@endguest
</div> 
</div>
</div>
 </nav> 

 @yield('banner')
<header class="p-3 py-4 mb-2 text-center text-white bg-danger"> 
<div class="container d-flex align-items-center flex-column">
<h2>@yield('subtitle', 'Online Store')</h2> </div>
</header>

<!-- header -->
@include('inc.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script> 
<script src="../path/to/flowbite/dist/flowbite.js"></script>
 @livewireScripts
 <!-- jquery -->
 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
</body> 
</html>


