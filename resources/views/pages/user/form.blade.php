@php
    $title = $user->exists ? 'Edit' : 'Tambah';
    $route = $user->exists ? route('user.update', $user->id) : route('user.store');
    $method = $user->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h3>{{ $title }} User </h3>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card mb-grid">
                <div class="card-body">
                    <form action="{{ $route }}" method="POST">
                        @csrf
                        @method($method)
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') ?? $user->email }}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $user->name }}" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Change Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Role</label>
                            <select class="form-control js-example-basic-single" name="role">
                                @foreach (\App\Enums\UserRole::cases() as $role)
                                    <option value="{{ $role->value }}" @selected($role === (old('role') ?? $user->role))>
                                        {{ $role->description() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
