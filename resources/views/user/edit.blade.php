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
<style>
form label {
    display: block;
    margin-top: 15px;
    font-weight: 600;
    color: #333;
}

form input[type="text"],
form input[type="email"],
form textarea {
    width: 100%;
    padding: 8px 12px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
    font-family: inherit;
    box-sizing: border-box;
}

form textarea {
    resize: vertical;
    min-height: 80px;
}

.error-msg {
    color: red;
    font-size: 0.9rem;
    margin-top: 3px;
}

.update-btn {
    margin-top: 25px;
    padding: 12px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1rem;
    transition: background-color 0.3s ease;
}

.update-btn:hover {
    background-color: #0056b3;
}

</style>
@section('section')
<div class="user-profile-container">
    <div class="user-card">
        <h2>Update Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('patient_profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
            @error('name') <p class="error-msg">{{ $message }}</p> @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
            @error('email') <p class="error-msg">{{ $message }}</p> @enderror

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->patient->phone) }}">
            @error('phone') <p class="error-msg">{{ $message }}</p> @enderror

            <label for="address">Address</label>
            <textarea id="address" name="address">{{ old('address', Auth::user()->patient->address) }}</textarea>
            @error('address') <p class="error-msg">{{ $message }}</p> @enderror

            <button type="submit" class="update-btn">Save Changes</button>
        </form>
    </div>
</div>

@endsection
@section('footer')
    <x-footer />
@endsection
