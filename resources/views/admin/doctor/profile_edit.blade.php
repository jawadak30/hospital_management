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
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Doctor Profile Update Form -->
                        <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Specialization -->
                            <div class="form-group">
                                <label for="specialization">Specialization</label>
                                <input type="text" name="specialization" id="specialization" class="form-control @error('specialization') is-invalid @enderror" value="{{ old('specialization', $doctor->specialization) }}">
                                @error('specialization')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                                        <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $doctor->description) }}">
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Availability -->
                            <div class="form-group">
                                <label for="availability">Availability</label>
                                <select name="availability" id="availability" class="form-control @error('availability') is-invalid @enderror">
                                    <option value="1" {{ $doctor->availability ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ !$doctor->availability ? 'selected' : '' }}>Unavailable</option>
                                </select>
                                @error('availability')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
<div class="form-group mt-3">
    <label for="pic_path">Profile Picture</label>
    <input type="file" name="pic_path" id="pic_path" class="form-control @error('pic_path') is-invalid @enderror" accept="image/*">

    @error('pic_path')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if($doctor->pic_path)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $doctor->pic_path) }}" alt="Current Profile Picture" class="img-thumbnail" width="120">
        </div>
    @else
        <div class="mt-2">
            <img src="{{ asset('default/default.jpg') }}" alt="Current Profile Picture" class="img-thumbnail" width="120">
        </div>
    @endif
</div>


                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update</button>
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
