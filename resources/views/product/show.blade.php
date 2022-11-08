@extends("layouts.app")
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"])
 @section('content')
<div class="mb-3 card">
<div class="row g-0"> <div class="col-md-4">
<img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
</div>
<div class="col-md-8">
<div class="card-body"> <h5 class="card-title">
{{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
</h5>
<p class="card-text">{{ $viewData["product"]->getDescription()}}</p> <p class="card-text">
<p class="card-text">
<form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
<div class="row"> @csrf
<div class="col-auto">
<div class="col-auto input-group">
<div class="input-group-text">Quantity</div>
<input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1"> </div>
</div>
<div class="col-auto">
<button class="text-white btn bg-primary" type="submit">Add to cart</button> </div>
</div> 
</form>
</p>
</div> 
</div>
</div>
</div>
@endsection