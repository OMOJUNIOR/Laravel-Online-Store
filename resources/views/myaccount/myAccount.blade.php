@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"]) 
@section('content')
@forelse ($viewData["orders"] as $order)
<div class="mb-4 card">
<div class="card-header"> Order #{{ $order->getId() }}
</div>
<div class="card-body">
<b>Date:</b> {{ $order->getCreatedAt() }}<br />
<b>Total:</b> ${{ $order->getTotal() }}<br />
<table class="table mt-3 text-center table-bordered table-striped">
<thead> <tr>
<th scope="col">Item ID</th>
<th scope="col">Product Name</th> 
<th scope="col">Price</th>
<th scope="col">Quantity</th>
</tr> </thead> <tbody>
@foreach ($order->getItems() as $item) <tr>
<td>{{ $item->getId() }}</td> 
<td>
<a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}"> {{ $item->getProduct()->getName() }}
</a>
 </td>
<td>${{ $item->getPrice() }}</td>
<td>{{ $item->getQuantity() }}</td>
 </tr>
@endforeach </tbody>
</table>
 </div>
</div>
@empty
<div class="alert alert-danger" role="alert">
 You have not purchased anything in our store yet.
</div>
@endforelse
@endsection