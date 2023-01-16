@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-button">
                <a href="{{ route('admin.users.create') }}"
                   class="btn btn-primary">Create New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></div>
                <div class="breadcrumb-item">All Users</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Users</h2>
            <p class="section-lead">
                You can manage all users, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Registered At</th>
                                    </tr>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                         src="https://res.cloudinary.com/dwinzyahj/image/upload/v1609855422/rqyxywrhl5vis0dnaenc.png"
                                                         class="rounded-circle"
                                                         width="35"
                                                         data-toggle="title"
                                                         title="">
                                                    <div class="d-inline-block ml-2">{{ $user->name }}</div>
                                                </a>

                                                <div class="table-links">
                                                    <a href="{{ route('admin.users.edit', $user) }}"
                                                       class="btn btn-link">Edit</a>
                                                    <div class="bullet"></div>
                                                    @if ($user->id !== auth()->user()->id)
                                                        <button data-bs-toggle="modal"
                                                                data-bs-target="#deleteUserModal{{ $user->id }}"
                                                                class="btn btn-link text-danger">
                                                            Trash
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles?->first()?->name ?? 'None' }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                        </tr>

                                        @push('modals')
                                            <div class="modal fade"
                                                 tabindex="-1"
                                                 id="deleteUserModal{{ $user->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirm</h5>
                                                            <button type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Once this action is done all the data about the
                                                                product will be permanently deleted. Are you sure?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('admin.users.destroy', $user) }}"
                                                               data-turbo-method="delete"
                                                               class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endpush
                                    @endforeach
                                </table>
                            </div>

                            <div class="float-right">
                                {{ $users->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
