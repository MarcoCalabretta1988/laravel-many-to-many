@extends('layouts.app')

@section('title','Types')

@section('content')

<section id="projects" >
   <header class="d-flex justify-content-between align-items-center py-3">
    <h1 class="text-white">Types:</h1>
    <a href="{{ route('admin.types.create')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add</a>
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
            @foreach ($types as $type)
            <tr>    
            <th scope="row">{{$type->id}}</th>
            <td>{{$type->label}}</td>
            <td style="color: {{$type->color}}"><i class="fa-solid fa-droplet fa-2x"></i></td>
            <td>{{$type->created_at}}</td>
            <td>{{$type->updated_at}}</td>
            <td>
              <div class="button-box d-flex justify-content-end">
                 <a href="{{ route('admin.types.edit', $type->id)}}" class="btn btn-warning  btn-sm mx-2"><i class="fa-solid fa-pencil"></i></a>
                  
      
                 <form action="{{ route('admin.types.destroy' , $type->id)}}" method="POST" class="delete-form">
                  @method('DELETE')
                  @csrf
                  <button  type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                 </form>
              </div>
              </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end align-items-center">
    
        @if($types->hasPages())
        {{ $types->links()}}
        @endif
      </div>
</section>
@endsection