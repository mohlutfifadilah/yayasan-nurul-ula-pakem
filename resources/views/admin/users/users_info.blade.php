{{-- <div class="user-info">
    <img src="{{ $user->profile_photo_path }}" alt="Foto" />
    <span>{{ $user->name }}</span>
</div> --}}
@if(session('error'))
<div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-start align-items-center user-info">
    <div class="avatar-wrapper">
        <div class="avatar avatar-sm me-3">
            @if ($user->profile_photo_path)
              <img src="{{ $user->profile_photo_path }}" alt="Avatar" class="rounded-circle">
            @else
              <span class="avatar-initial rounded-circle bg-label-success"></span>
            @endif
        </div>
    </div>
    <div class="d-flex flex-column">
        <a href="userView" class="text-heading text-truncate">
          <span class="fw-semibold"> {{ $user->name }}</span>
        </a>
        <small class="text-muted">
            {{ $user->email }}
        </small>
    </div>
</div>
