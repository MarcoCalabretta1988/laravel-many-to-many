@extends('layouts.app')

@section('title' , 'Add new project')

@section('content')

<h1 class="text-white text-center py-5">- Add new project -</h1>
<div class="bg-dark text-white p-5">

    @include('includes.projects.form')
</div>



@endsection

