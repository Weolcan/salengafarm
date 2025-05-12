<div class="card">
    <div class="card-header bg-light">
        <h6 class="mb-0"><i class="fas fa-camera me-2"></i>Profile Picture</h6>
    </div>
    <div class="card-body text-center">
        <div class="profile-picture-container mb-3" style="width: 100px; height: 100px;">
            @if(auth()->user()->avatar)
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile Picture" class="rounded-circle profile-picture" style="width: 100%; height: 100%; object-fit: cover;">
            @else
                <div class="profile-picture-placeholder" style="width: 100%; height: 100%;">
                    <i class="fas fa-user"></i>
                </div>
            @endif
        </div>
        
        <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            
            <div class="mb-3">
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
            </div>
            
            <button type="submit" class="btn btn-primary">
                Update Picture
            </button>
        </form>
    </div>
</div> 