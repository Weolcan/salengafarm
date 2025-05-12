<div class="card">
    <div class="card-header bg-light">
        <h6 class="mb-0 text-xs"><i class="fas fa-user me-2"></i>Profile Information</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name" class="form-label text-xs">First Name</label>
                        <input type="text" class="form-control text-xs" id="first_name" name="first_name" 
                               value="{{ old('first_name', auth()->user()->first_name) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name" class="form-label text-xs">Last Name</label>
                        <input type="text" class="form-control text-xs" id="last_name" name="last_name" 
                               value="{{ old('last_name', auth()->user()->last_name) }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="contact_number" class="form-label text-xs">Contact Number</label>
                <input type="tel" class="form-control text-xs" id="contact_number" name="contact_number" 
                       value="{{ old('contact_number', auth()->user()->contact_number) }}" required>
            </div>

            <div class="form-group">
                <label for="company_name" class="form-label text-xs">Company Name</label>
                <input type="text" class="form-control text-xs" id="company_name" name="company_name" 
                       value="{{ old('company_name', auth()->user()->company_name) }}" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label text-xs">Email</label>
                <input type="email" class="form-control text-xs" id="email" name="email" 
                       value="{{ old('email', auth()->user()->email) }}" required>
            </div>

            <button type="submit" class="btn btn-primary text-xs">
                Save Changes
            </button>
        </form>
    </div>
</div> 