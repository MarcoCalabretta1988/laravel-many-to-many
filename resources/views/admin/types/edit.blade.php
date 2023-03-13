@extends('layouts.app')

@section('title' , 'Edit type')

@section('content')

<h1 class="text-white text-center py-5">- Edit type -</h1>
<div class="bg-dark text-white p-5">
    @include('includes.types.form')
</div>



@endsection

