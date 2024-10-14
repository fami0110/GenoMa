@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed" style="bottom: 0; right: 1rem; z-index: 99;" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show position-fixed" style="bottom: 0; right: 1rem; z-index: 99;" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('error'))
    <div class="alert alert-error alert-dismissible fade show position-fixed" style="bottom: 0; right: 1rem; z-index: 99;" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show position-fixed" style="bottom: 0; right: 1rem; z-index: 99;" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
