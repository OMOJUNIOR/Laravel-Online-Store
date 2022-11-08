@extends('layouts.app')
 @section('content')
<div class="card">
<div class="card-header"> Purchase Not completed</div>
<div class="card-body">
<div class="alert alert-danger" role="alert">
<b>{{ $viewData ['error'] }}</b>
</div> 
</div>
</div> 
@endsection
