@if(session('msg'))
  <div class="alert alert-{{session('type') ?? 'info'}} " >
            {{ session('msg')}}
  </div>
@endif