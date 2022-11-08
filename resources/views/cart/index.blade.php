@extends('layouts.app')
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"])
 @section('content')
<div class="card">
<div class="card-header"> Products in Cart
</div>
<div class="card-body">
<table class="table text-center table-bordered table-striped"> 
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Product Name</th>
<th scope="col">Price</th>
<th scope="col">Quantity</th>
</tr> 
</thead>
<tbody>
@foreach ($viewData["products"] as $product) <tr>
<td>{{ $product->getId() }}</td>
<td>{{ $product->getName() }}</td>
<td>${{ $product->getPrice() }}</td>
<td>{{ session('products')[$product->getId()] }}</td>
</tr>
@endforeach </tbody>
</table>
<div class="row">
<div class="text-end">
<a class="mb-2 btn btn-outline-secondary"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
@if(count($viewData['products'])>0)
<a href="{{ route('cart.purchase') }}"  class="mb-2 text-white btn bg-primary">Buy Now</a>
<a href="{{ route('cart.delete') }}">
<button class="mb-2 btn btn-danger"> Remove all products from Cart
</button>
 </a>
 @endif
</div> 
</form>
</div>
</div> 
</div>
@endsection