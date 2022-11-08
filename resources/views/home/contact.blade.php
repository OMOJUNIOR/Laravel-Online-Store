@extends('layouts.app')
@section('title', 'contact-page : Online Store')
@section('content')
<div class="container"> <div class="row">
<div class="col-lg-4 ms-auto">
<p class="lead">{{ $viewData["email"] }}</p>
</div>
<div class="col-lg-4 ms-auto">
<p class="lead">{{ $viewData['address'] }}</p>
</div>
<div class="col-lg-4 ms-auto">
<p class="lead">{{ $viewData["phone"] }}</p>
</div>
<div class="col-lg-4 me-auto">
<p class="lead">{{ $viewData["phone1"]  }}</p> </div>
</div> </div>
@endsection