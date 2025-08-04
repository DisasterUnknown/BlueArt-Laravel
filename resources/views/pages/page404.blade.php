@extends('layouts.app')

@section('title', '404 Page')

@section('scriptIndex')
{{ asset('') }}
@endsection

@section('scriptPage')
{{ asset('') }}
@endsection

@section('content')
<div id="noProductCartId" class="flex items-center justify-center min-h-[calc(100vh-92px)]">
    <p class="text-6xl text-center font-bold">404 <br> Error: Page Not Found</p>
</div>
@endsection