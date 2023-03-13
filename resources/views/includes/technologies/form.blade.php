

@if ($technology->exists)
    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
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
   
    
    <div class="col-3">
        <div class="mb-3">
            <label for="label" class="form-label">Label:</label>
            <input technology="text" class="form-control @error('label') is-invalid @enderror" id="label" name='label' value="{{ old('label', $technology->label) }}" required>
                @error('label')
                   <div class="invalid-feedback">{{ $message}}</div>
                @enderror
        </div>
    </div>
    
    <div class="col-1">
        <div class="mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="color" class="form-control @error('color') is-invalid @enderror" id="color" name='color' value="{{ old('color', $technology->color) }}" required>
                @error('color')
                   <div class="invalid-feedback">{{ $message}}</div>
                @enderror
        </div>
    </div>
    
</div>
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.technologies.index')}}" class="btn btn-primary me-2"><i class="fa-solid fa-arrow-left"></i> Back </a>
    <button technology="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Save</button>
</div>
</form>

