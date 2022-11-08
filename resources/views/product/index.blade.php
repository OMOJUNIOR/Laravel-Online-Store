@extends('layouts.app')
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content')
<div class="row">
@foreach ($viewData["products"] as $product) <div class="mb-2 col-md-4 col-lg-3">
<div class="card">
<img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">
<div class="text-center card-body">
<a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="text-white btn bg-primary">{{ $product->getName() }}</a>
<a href ="#" class="text-white btn bg-primary"> $ {{$product->getPrice() }}</a>
</div> </div>
</div>
@endforeach
<p class= "flex bg-blue-500 flexbox"> {{$viewData['products']->links()}} </p>

</div> 
@endsection
