@extends('layouts.app')

@section('title','Technologies')

@section('content')

<section id="technologies" >
   <header class="d-flex justify-content-between align-items-center py-3">
    <h1 class="text-white">Technologies:</h1>
    <a href="{{ route('admin.technologies.create')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add</a>
   </header>
   

    <table class="table table-dark table-striped ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Label</th>
            <th scope="col">Color</th>
            <th scope="col">Create At</th>
            <th scope="col">Update At</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
            <tr>    
            <th scope="row">{{$technology->id}}</th>
            <td>{{$technology->label}}</td>
            <td style="color: {{$technology->color}}"><i class="fa-solid fa-droplet fa-2x"></i></td>
            <td>{{$technology->created_at}}</td>
            <td>{{$technology->updated_at}}</td>
            <td>
              <div class="button-box d-flex justify-content-end">
                 <a href="{{ route('admin.technologies.edit', $technology->id)}}" class="btn btn-warning  btn-sm mx-2"><i class="fa-solid fa-pencil"></i></a>
                  
      
                 <form action="{{ route('admin.technologies.destroy' , $technology->id)}}" method="POST" class="delete-form">
                  @method('DELETE')
                  @csrf
                  <button  technology="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                 </form>
              </div>
              </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end align-items-center">
    
        @if($technologies->hasPages())
        {{ $technologies->links()}}
        @endif
      </div>
</section>
@endsection