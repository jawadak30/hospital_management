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
        <div class="row">
            <div class="col-lg-8">
                <div class="profile-content tab-content">
                    <div class="tab-pane fade active show">
                        <div class="card">
                            <div class="card-header" style="display: flex
;
    justify-content: space-between;">
                                <h4 class="card-title">Doctor Profile</h4>
                                <a href="{{ route('doctor.profile.edit') }}" class="btn btn-primary btn-sm">update</a>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $user->name }}</h3>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

                                @if ($doctor)
                                    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                                    <p><strong>Availability:</strong>
                                        {{ $doctor->availability ? 'Available' : 'Unavailable' }}</p>
                                @else
                                    <p class="text-danger">Doctor profile not found.</p>
                                @endif

                                <p><strong>Account Created:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                                <p><strong>Email Verified:</strong> {{ $user->email_verified_at ? 'Yes' : 'No' }}</p>
                                <p><strong>Last Login:</strong>
                                    {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('Y-m-d H:i') : 'Never' }}
                                </p>
                            </div>
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
