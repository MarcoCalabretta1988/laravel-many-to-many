@extends('layouts.app')

@section('title' , 'Add new technologies')

@section('content')

<h1 class="text-white text-center py-5">- Add new type -</h1>
<div class="bg-dark text-white p-5">

    @include('includes.technologies.form')
</div>



@endsection
