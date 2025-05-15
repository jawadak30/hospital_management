@extends('basedashboard')
@section('aside')
@include('admin.admin_components.aside')
@endsection

@section('nav')
    @include('admin.admin_components.nav')
@endsection
@section('banner')
    @include('admin.admin_components.banner')
@endsection

@section('container_fluid')
<div class="container-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ trans('mainTrans.update') }} {{ trans('mainTrans.user') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
<form action="{{ route('update_user', $user->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <!-- Role Field -->
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
            <option value="doctor" {{ old('role', $user->role) == 'doctor' ? 'selected' : '' }}>Doctor</option>
            <option value="secretary" {{ old('role', $user->role) == 'secretary' ? 'selected' : '' }}>Secretary</option>
            <option value="patient" {{ old('role', $user->role) == 'patient' ? 'selected' : '' }}>Patient</option>
            <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
        </select>
        @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Role</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('settings')
    @include('admin.admin_components.settings')
@endsection

