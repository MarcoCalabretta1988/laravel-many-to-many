@extends('layouts.app')

@section('title',$project->name)

@section('content')

<header class="py-5">
    <h1 class="text-center text-white">{{ucfirst($project->name)}}</h1>
</header>

<div class="row row-cols-2 bg-dark text-white py-5 rounded border border-warning">
  <div class="col d-flex justify-content-center align-items-center">
  <img src=@if($project->image){{ asset('storage/' . $project->image)}} @else "https://media.istockphoto.com/id/1357365823/vector/default-image-icon-vector-missing-picture-page-for-website-design-or-mobile-app-no-photo.jpg?s=612x612&w=0&k=20&c=PM_optEhHBTZkuJQLlCjLz-v3zzxp-1mpNQZsdjrbns=" @endif alt="$project->name" class="img-fluid">
</div>
  <div class="col">
    <p>{{$project->description}}</p>
    <hr>
    <strong>Create at: </strong> <time>{{ $project->created_at}}</time>
    <div class="my-2">
      <strong >Last update: </strong> <time>{{ $project->updated_at}}</time>
    </div>
    <div>
      <strong>Type: </strong>{{$project->type?->label}}
    </div>
    <form action="{{ route('admin.projects.toggle', $project->id)}}" method="POST" class="my-2">
      @method('PATCH')
      @csrf
      <button type="submit" class="btn {{ $project->is_published ? 'text-success' : 'text-danger'}}">
        <i class="fa-solid fa-2x fa-toggle-{{ $project->is_published ? 'on' : 'off'}}"></i>
          {{ $project->is_published ? 'Switch in draft' : 'Switch in published'}}
        </button>
    
    </form>
</div>
</div>

<div class="button-box d-flex justify-content-end mt-3">
    <a href="{{ route('admin.projects.edit',$project->id)}}"class="btn btn-warning"><i class="fa-solid fa-pencil"></i> Edit</a>
   <form action="{{ route('admin.projects.destroy' , $project->id)}}" method="POST" class="delete-form">
    @method('DELETE')
    @csrf
    <button  type="submit" class="btn btn-danger mx-2"><i class="fa-solid fa-trash"></i> Delete</button>
   </form>
    <a href="{{ route('admin.projects.index')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back </a>

</div>



@endsection

