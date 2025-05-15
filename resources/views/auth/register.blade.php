@extends('base')
@push('styles')
    @vite('resources/css/form.css')
@endpush
@section('header')
    <x-header  />
@endsection
@section('section')
{{-- <x-guest-layout> --}}
<div class="cont">
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto">
        @csrf

        <!-- Name -->
        <div class="relative mt-6">
            <input
                id="name"
                name="name"
                type="text"
                class="floating-input"
                placeholder=" "
                required
                autofocus
                autocomplete="name"
            />
            <label for="name" class="floating-label">{{ trans('mainTrans.name') }}</label>
            @error('name')
            <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="relative mt-6">
            <input
                id="email"
                name="email"
                type="email"
                class="floating-input"
                placeholder=" "
                required
                autocomplete="username"
            />
            <label for="email" class="floating-label">{{ trans('mainTrans.email') }}</label>
            @error('email')
            <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="relative mt-6">
            <input
                id="password"
                name="password"
                type="password"
                class="floating-input"
                placeholder=" "
                required
                autocomplete="new-password"
            />
            <label for="password" class="floating-label">{{ trans('mainTrans.password') }}</label>
            @error('password')
            <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="relative mt-6">
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="floating-input"
                placeholder=" "
                required
                autocomplete="new-password"
            />
            <label for="password_confirmation" class="floating-label">{{ trans('mainTrans.confirm_password') }}</label>
            @error('password_confirmation')
            <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date of Birth -->
<div class="relative mt-6">
    <input
        id="dob"
        name="dob"
        type="date"
        class="floating-input"
        placeholder=" "
        required
    />
    <label for="dob" class="floating-label">Date of Birth</label>
    @error('dob')
    <span class="error-text">{{ $message }}</span>
    @enderror
</div>

<!-- Address -->
<div class="relative mt-6">
    <input
        id="address"
        name="address"
        type="text"
        class="floating-input"
        placeholder=" "
        required
    />
    <label for="address" class="floating-label">Address</label>
    @error('address')
    <span class="error-text">{{ $message }}</span>
    @enderror
</div>

<!-- Phone -->
<div class="relative mt-6">
    <input
        id="phone"
        name="phone"
        type="text"
        class="floating-input"
        placeholder=" "
        required
    />
    <label for="phone" class="floating-label">Phone</label>
    @error('phone')
    <span class="error-text">{{ $message }}</span>
    @enderror
</div>


        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:underline">{{ trans('mainTrans.already') }}</a>
            <button
                type="submit"
                class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring focus:ring-indigo-300">
                {{ trans('mainTrans.register') }}
            </button>
        </div>
    </form>
</div>

{{-- </x-guest-layout> --}}
@endsection
