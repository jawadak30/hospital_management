@extends('base')
@section('header')
    <x-header  />
@endsection

<style>
    .user-profile-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
}

.user-card {
    background-color: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.user-card h2 {
    font-size: 1.8rem;
    color: #007bff;
    margin-bottom: 20px;
}

.user-info p {
    font-size: 1rem;
    margin: 10px 0;
    color: #333;
}

.update-btn {
    display: inline-block;
    margin-top: 20px;
    background-color: #007bff;
    color: white;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.update-btn:hover {
    background-color: #0056b3;
}

</style>
@section('section')
<div class="user-profile-container">
    <div class="user-card">
        <h2>Profile</h2>

        <div class="user-info">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not provided' }}</p>
            <p><strong>Address:</strong> {{ Auth::user()->address ?? 'Not provided' }}</p>
            {{-- <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p> --}}
        </div>

        <a href="{{ route('patient_profile.edit') }}" class="update-btn">Update Profile</a>
    </div>
</div>

@endsection
@section('footer')
    <x-footer />
@endsection
