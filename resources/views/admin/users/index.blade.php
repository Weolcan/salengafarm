<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/salengap-modified.png') }}" alt="Salenga Logo" class="nav-logo">
                <span class="brand-text">Salenga Farm</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="navbar-collapse-inner">
                    <ul class="navbar-nav center-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('public.plants') }}">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        @if(auth()->user()->hasAdminAccess())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('requests.*') ? 'active' : '' }}" href="{{ route('requests.index') }}">
                                <i class="fas fa-file-invoice me-1"></i>Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-chart-line me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('walk-in.index') }}">
                                <i class="fas fa-cash-register me-1"></i>Walk-in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plants.index') }}">
                                <i class="fas fa-leaf me-1"></i>Inventory
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users.index') }}">
                                <i class="fas fa-users me-1"></i>Users
                            </a>
                        </li>
                        @endif
                    </ul>
                    <div class="user-section">
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle profile-btn" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile" class="profile-pic">
                                @else
                                    <div class="profile-pic-placeholder">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                                <span>{{ auth()->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user me-2"></i>Profile
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12 p-4">
                <h2>User Management</h2>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Users Table -->
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Role</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>
                                                <span class="badge {{ $user->role === 'manager' ? 'bg-primary' : 'bg-success' }}">
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                                @if ($user->is_client)
                                                    <span class="badge bg-info">Client</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end gap-2">
                                                    <button type="button"
                                                            class="btn btn-link text-dark p-0"
                                                            onclick="editUser({{ $user->id }})"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editUserModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button class="btn btn-link text-dark p-0"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#userDetails{{ $user->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>

                                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-link text-danger p-0"
                                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="collapse mt-2" id="userDetails{{ $user->id }}">
                                                    <div class="card card-body">
                                                        <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                                                        <p class="mb-1"><strong>Company:</strong> {{ $user->company_name }}</p>
                                                        <p class="mb-1"><strong>Contact:</strong> {{ $user->contact_number }}</p>
                                                        <p class="mb-0"><strong>Registered:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" tabindex="0"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="edit_contact_number" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="edit_company_name" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_role" class="form-label">Role</label>
                            <select class="form-select" id="edit_role" name="role" required>
                                <option value="user">User</option>
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edit_is_client" name="is_client" value="1">
                                <label class="form-check-label" for="edit_is_client">Client Access</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" tabindex="0">Cancel</button>
                    <button type="submit" form="editUserForm" class="btn btn-primary" tabindex="0">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            const editModal = document.getElementById('editUserModal');

            if (editModal) {
            // Handle modal focus management
            editModal.addEventListener('shown.bs.modal', function () {
                document.getElementById('edit_first_name').focus();
            });

            editModal.addEventListener('hidden.bs.modal', function () {
                // Return focus to the edit button that opened the modal
                document.activeElement.blur();
            });
            } else {
                console.error('Element with ID "editUserModal" not found.');
            }

            function togglePasswordVisibility(inputId) {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(inputId + '_toggle');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }

            function editUser(userId) {
                // Store the button that triggered the modal
                const triggerButton = document.activeElement;

                // Fetch user data and populate the form
                fetch(`/users/${userId}/edit`)
                    .then(response => response.json())
                    .then(user => {
                        document.getElementById('edit_first_name').value = user.first_name;
                        document.getElementById('edit_last_name').value = user.last_name;
                        document.getElementById('edit_email').value = user.email;
                        document.getElementById('edit_contact_number').value = user.contact_number;
                        document.getElementById('edit_company_name').value = user.company_name;
                        document.getElementById('edit_role').value = user.role;
                        document.getElementById('edit_is_client').checked = user.is_client;

                        // Update form action URL
                        document.getElementById('editUserForm').action = `/users/${userId}`;

                        // Store the trigger button for focus management
                        editModal.dataset.triggerButton = triggerButton;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error fetching user data');
                    });
            }

            // Make functions globally available
            window.togglePasswordVisibility = togglePasswordVisibility;
            window.editUser = editUser;
        });
    </script>
</body>
</html>