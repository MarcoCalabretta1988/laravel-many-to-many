@extends('layouts.app')

@section('title','Projects')

@section('content')

<section id="projects" >
   <header class="d-flex justify-content-between align-items-center py-3">
    <h1 class="text-white">Projects:</h1>
    <a href="{{ route('admin.projects.create')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add</a>
   </header>
   
   <form action="{{ route('admin.projects.index')}}" method="GET">
     <div class="d-flex justify-content-between align-items-center mb-3">
     <div class="input-group w-25">

        <select class="form-select" id="filter" name="filter">
          <option value="">All</option>
          <option @if($filter === 'published') selected @endif value="published">Published</option>
          <option @if($filter === 'drafts') selected @endif  value="drafts">Drafts</option>
        </select>
        <button class="btn btn-primary" type="submit">Filter</button>
      </div>
    </div>
    </form>

    <table class="table table-dark table-striped ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">Create At</th>
            <th scope="col">Update At</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>    
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->name}}</td>
            <td>
              
              @if($project->type)
              <span class="badge" style="background-color: {{$project->type->color}}">{{$project->type->label}}</span>
              @else
                  -
              @endif
            </td>
            <td>
              
              <form action="{{ route('admin.projects.toggle', $project->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <button type="submit" class="btn {{ $project->is_published ? 'text-success' : 'text-danger'}}"><i class="fa-solid fa-2x fa-toggle-{{ $project->is_published ? 'on' : 'off'}}"></i></button>
              
              </form>

              
            </td>
            <td>{{$project->created_at}}</td>
            <td>{{$project->updated_at}}</td>
            <td>
              <div class="button-box d-flex justify-content-end">
                  <a href="{{route('admin.projects.show',$project->id)}}" class="btn btn-sm btn-primary"><i class="fa-sharp fa-solid fa-eye"></i></a>
                  <a href="{{ route('admin.projects.edit',$project->id)}}"class="btn btn-warning  btn-sm mx-2"><i class="fa-solid fa-pencil"></i></a>
                 <form action="{{ route('admin.projects.destroy' , $project->id)}}" method="POST" class="delete-form">
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
    
        @if($projects->hasPages())
        {{ $projects->links()}}
        @endif
      </div>
</section>
@endsection