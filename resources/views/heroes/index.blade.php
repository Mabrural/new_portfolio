@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Manage Hero Section</h3>
                    <h6 class="text-muted mb-2">Customize the first section visitors see on your landing page</h6>
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


                @if (!$hero)
                    <p>No hero data yet.</p>
                    <a href="{{ route('heroes.create') }}" class="btn btn-primary">Create Hero</a>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $hero->name }}</h4>
                            <h6>{{ $hero->subname }}</h6>
                            <p>{{ $hero->description }}</p>
                            @if ($hero->image)
                                <img src="{{ asset('storage/' . $hero->image) }}" alt="" width="200">
                            @endif
                            <br>
                            <a href="{{ route('heroes.edit', $hero) }}" class="btn btn-warning mt-2">Edit Hero</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
