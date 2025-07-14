@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Manage Skill Section</h3>
                    <h6 class="text-muted mb-2">Update and manage the list of your technical skills shown to potential
                        clients</h6>
                </div>
                <div class="ms-md-auto">
                    <a href="{{ route('skills.create') }}" class="btn btn-primary">+ Create Skill</a>
                </div>
            </div>

            <div class="row">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif

                @if (session('info'))
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'info',
                            title: '{{ session('info') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($skills->isEmpty())
                                <p>No skill data yet.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Subname</th>
                                                <th>Icon</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($skills as $skill)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $skill->name }}</td>
                                                    <td>{{ $skill->subname }}</td>
                                                    <td>
                                                        @if ($skill->icon)
                                                            <code>{{ Str::limit($skill->icon, 30) }}</code>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-default dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('skills.edit', $skill) }}">
                                                                        <i class="fas fa-edit me-1 text-warning"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('skills.destroy', $skill) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this skill?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger">
                                                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
