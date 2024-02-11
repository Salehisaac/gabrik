
@if(session('alert-section-error'))

    <div class="alert alert-danger mr-2" role="alert">
        {{ session('alert-section-error') }}
    </div>

@endif
