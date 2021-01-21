@if($errors)
    @foreach($errors->all() as $error)
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
                {{ $error }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endforeach
@endif
