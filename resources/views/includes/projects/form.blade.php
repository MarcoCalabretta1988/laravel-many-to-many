@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
@endif
@csrf

{{-- ERROR ALERT --}}
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- FORM INPUT FIELD --}}
<div class="row py-5">
   {{-- NAME INPUT --}}
    <div class="col-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' placeholder="Name" minlength="1" maxlength="50"
                value="{{ old('name', $project->name) }}" required>
                @error('name')
                   <div class="invalid-feedback">{{ $message}}</div>
                @else
                  <small class="text-muted">Inserisci il nome del progetto</small>
                @enderror
        </div>
    </div>
{{-- TYPE SELECT --}}
    <div class="col-3">
        <label for="Type" class="form-label">Type:</label>
        <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
            <option value="">None</option>
            @foreach ($types as $type )
                
            <option @if(old('type_id',$project->type_id) == $type->id) selected @endif value="{{$type->id}}">{{$type->label}}</option>
            @endforeach
       
          </select>
          @error('type_id')
          <div class="invalid-feedback">{{ $message}}</div>
      
       @enderror
    </div>
{{-- IMG UPLOAD --}}
    <div class="col-4">
        <div class="mb-3">
            <label for="image" class="form-label">Url:</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name='image'
                value="{{ old('image', $project->image) }}">
                @error('image')
                   <div class="invalid-feedback">{{ $message}}</div>
                @else
                  <small class="text-muted">Inserisci l'imagine del progetto</small>
                @enderror
        </div>
    </div>
{{-- IMG PREVIEW --}}
    <div class="col-1">
        <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://media.istockphoto.com/id/1357365823/vector/default-image-icon-vector-missing-picture-page-for-website-design-or-mobile-app-no-photo.jpg?s=612x612&w=0&k=20&c=PM_optEhHBTZkuJQLlCjLz-v3zzxp-1mpNQZsdjrbns='}}" alt="{{ old('name', $project->name) }}" class="img-fluid" id="img-prev">
    </div>
   {{-- DESCRIPTION INPUT --}}
    <div class="col-12">
        <div class="mb-5">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" required>{{ old('description', $project->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message}}</div>
         @else
           <small class="text-muted">Inserisci la descrizione del progetto</small>
         @enderror
        </div>
    </div>
{{-- TECHNOLOGY CHECKBOX --}}
   <div class="col-12">
    <h5>Technologies:</h5>
    @foreach ($technologies as $technology )  
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="tech-{{$technology->label}}" value="{{$technology->id}}" name="technologies[]" @if(in_array($technology->id,old('technologies',$project_technologies ?? [] ))) checked @endif>
        <label class="form-check-label" for="tech-{{$technology->label}}">{{$technology->label}}</label>
      </div>
      @endforeach
   </div>
</div>
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.projects.index')}}" class="btn btn-primary me-2"><i class="fa-solid fa-arrow-left"></i> Back </a>
    <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Save</button>
</div>
</form>

