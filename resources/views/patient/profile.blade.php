@extends('base')
@section('header')
    <x-header  />
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400;500;600&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'League Spartan', sans-serif;
    }



    .profile-card {
        width: 100%;
        /* max-width: 400px; */
        background: white;
        /* border-radius: 20px; */
        /* overflow: hidden; */
        /* box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); */
        position: relative;
        margin: 0 auto;
    }

    .profile-header {
        padding: 20px;
        text-align: center;
        position: relative;
    }

    .back-button {
        position: absolute;
        left: 20px;
        top: 25px;
        width: 14px;
        height: 8px;
        transform: rotate(-90deg);
        border-left: 2px solid #2260FF;
        border-bottom: 2px solid #2260FF;
        cursor: pointer;
    }

    .profile-title {
        color: #2260FF;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .doctor-image-container {
        position: relative;
        width: 100%;
        height: 250px;
        background: #CAD6FF;
        border-radius: 15px;
        margin-bottom: 70px;
        overflow: hidden;
    }

    .doctor-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        border: 5px solid white;
        background: #D9D9D9;
    }

    .doctor-info {
        padding: 0 20px 20px;
    }

    .doctor-name {
        text-align: center;
        color: #2260FF;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .doctor-specialty {
        text-align: center;
        color: #333;
        font-size: 14px;
        font-weight: 300;
        margin-bottom: 20px;
    }

    .doctor-meta {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .meta-item {
        background: white;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
        color: #2260FF;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .meta-item i {
        display: inline-block;
        font-size: 30px;
        /* border: 1px solid #2260FF;
        border-radius: 50%; */
    }

    .section {
        margin-bottom: 20px;
        padding: 0 20px;
    }

    .section-title {
        color: #2260FF;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .section-content {
        color: #333;
        font-size: 20px;
        font-weight: 300;
        line-height: 1.5;
    }

    /* Schedule Section Styles */
    .schedule-container {
        margin-bottom: 20px;
    }

    .schedule-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .schedule-title {
        color: #2260FF;
        font-size: 16px;
        font-weight: 500;
    }

    .current-date {
        color: #2260FF;
        font-size: 14px;
        font-weight: 400;
    }

    .calendar {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        overflow-x: auto;
        padding-bottom: 10px;
    }

    .day {
        min-width: 40px;
        height: 60px;
        background: white;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .day.active {
        background: #2260FF;
        color: white;
    }

    .day-number {
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 3px;
    }

    .day-name {
        font-size: 10px;
        font-weight: 300;
        text-transform: uppercase;
    }

    .time-slots {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .time-slot {
        background: #CAD6FF;
        border-radius: 12px;
        padding: 8px;
        text-align: center;
        font-size: 12px;
        color: #2260FF;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .time-slot:hover {
        background: #2260FF;
        color: white;
    }

    .time-slot.selected {
        background: #2260FF;
        color: white;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        border-top: 1px solid #eee;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        border: none;
    }

    .btn-primary {
        background: #2260FF;
        color: white;
    }

    .btn-primary i {
        display: inline-block;
        width: 10px;
        height: 10px;
        border: 1px solid white;
    }

    .social-icons {
        display: flex;
        gap: 10px;
    }

    .social-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .social-icon i {
        display: inline-block;
        width: 12px;
        height: 12px;
        border: 1px solid #2260FF;
    }

    /* Media Queries */
    @media (max-width: 768px) {
        /* .profile-card {
            max-width: 350px;
        } */

        .doctor-name {
            font-size: 16px;
        }

        .doctor-specialty {
            font-size: 12px;
        }

        .doctor-meta {
            gap: 8px;
        }

        /* .meta-item {
            font-size: 10px;
        } */

        .section-title {
            font-size: 14px;
        }

        .section-content {
            font-size: 15pxpx;
        }

        .time-slots {
            grid-template-columns: repeat(2, 1fr);
        }

        .doctor-image {
            width: 180px;
            height: 180px;
            bottom: -40px;
        }
    }

    @media (max-width: 480px) {
        .doctor-image {
            width: 150px;
            height: 150px;
            bottom: -30px;
        }

        .doctor-image-container {
            height: 200px;
            margin-bottom: 50px;
        }

        .time-slots {
            grid-template-columns: repeat(2, 1fr);
        }

        .doctor-info {
            padding: 0 10px 20px;
        }

        .profile-title {
            font-size: 20px;
        }
    }

</style>

@section('section')
    <div class="profile-card">
        <div class="profile-header">
            <h1 class="profile-title">Doctor Info</h1>

            <div class="doctor-image-container">
                @if($doctor->pic_path)
                    <img class="doctor-image" src="{{ asset('storage/' . $doctor->pic_path) }}" alt="Doctor Photo">
                @else
                    <img class="doctor-image" src="{{ asset('default/default.jpg') }}" alt="Doctor Photo">
                @endif
            </div>

            @php
                use Carbon\Carbon;

                $now = Carbon::now();
                $dayOfWeek = $now->format('N');
                $currentHour = $now->hour;

                $isWeekday = $dayOfWeek >= 1 && $dayOfWeek <= 6;
                $isWorkingHour = $currentHour >= 9 && $currentHour < 17;

                $isAvailableToday = $doctor->availability && $isWeekday ;
            @endphp

            <div class="doctor-info">
                <h2 class="doctor-name">{{ $doctor->user->name }}</h2>
                <p class="doctor-specialty">{{ $doctor->specialization }}</p>

                <div class="doctor-meta">
                    <div class="meta-item">
                        <i class="fa fa-calendar-check"></i>
                        <span style="color: {{ $isAvailableToday ? 'blue' : 'red' }}; font-size: 15px;">
                            {{ $isAvailableToday ? 'Available Today (9 AM - 5 PM)' : 'Not Available Today' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h3 class="section-title">Profile</h3>
            <p class="section-content">
                {{ $doctor->description ?: 'No description provided.' }}
            </p>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="container" style="padding-bottom: 10px">
        @if (auth()->check() && auth()->user()->isPatient())
    <form method="GET" action="{{ route('patient.view_profile', $doctor->id) }}" class="mb-3">
        <div class="mb-3">
            <label for="date" class="form-label">Choose a date:</label>
            <input
                type="date"
                id="date"
                name="date"
                value="{{ $date }}"
                min="{{ now()->toDateString() }}"
                class="form-control"
                onchange="this.form.submit()"
            >
        </div>
    </form>
@endif

@guest
    <form method="GET" action="{{ route('view_profile', $doctor->id) }}" class="mb-3">
        <div class="mb-3">
            <label for="date" class="form-label">Choose a date:</label>
            <input
                type="date"
                id="date"
                name="date"
                value="{{ $date }}"
                min="{{ now()->toDateString() }}"
                class="form-control"
                onchange="this.form.submit()"
            >
        </div>
    </form>
@endguest

{{-- Appointment Booking Form --}}
@if ($doctor->availability && count($availableSlots) > 0)
    @auth
        @if (auth()->user()->isPatient())
            <form method="POST" action="{{ route('patient.appointments.store', $doctor->id) }}" class="border p-3 rounded shadow-sm bg-light">
                @csrf
                <input type="hidden" name="appointment_date" value="{{ $date }}">

                <div class="mb-3">
                    <label for="time" class="form-label">Select time:</label>
                    <select name="appointment_time" id="time" class="form-select" required>
                        @foreach ($availableSlots as $slot)
                            <option value="{{ $slot }}">
                                {{ \Carbon\Carbon::createFromFormat('H:i', $slot)->format('g:i A') }}
                            </option>
                        @endforeach
                    </select>
                    @error('appointment_time')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Book Appointment</button>
            </form>
        @endif
    @endauth

    @guest
        <form method="POST" action="{{ route('appointments.store', $doctor->id) }}" class="border p-3 rounded shadow-sm bg-light">
            @csrf
            <input type="hidden" name="appointment_date" value="{{ $date }}">

            <div class="mb-3">
                <label for="time" class="form-label">Select time:</label>
                <select name="appointment_time" id="time" class="form-select" required>
                    @foreach ($availableSlots as $slot)
                        <option value="{{ $slot }}">
                            {{ \Carbon\Carbon::createFromFormat('H:i', $slot)->format('g:i A') }}
                        </option>
                    @endforeach
                </select>
                @error('appointment_time')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </form>
    @endguest
@elseif (!$doctor->availability)
    <div class="alert alert-warning mt-3">Doctor is currently not available.</div>
@else
    <div class="alert alert-info mt-3">
        No available appointment slots on {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}.
    </div>
@endif

    </div>
{{-- Date Picker Form --}}
@endsection


<style>
    /* Form container */
form.appointment-form, form.form-inline {
    max-width: 400px;
    margin-top: 20px;
    padding: 20px;
    background: #f7f9fc;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Labels */
form label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
}

/* Inputs and selects */
form input[type="date"],
form select {
    width: 100%;
    padding: 10px 14px;
    margin-bottom: 12px;
    border: 1.8px solid #d0d7de;
    border-radius: 6px;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

form input[type="date"]:focus,
form select:focus {
    border-color: #3b82f6; /* nice blue */
    outline: none;
    box-shadow: 0 0 6px #3b82f6aa;
}

/* Error message */
.error-message {
    color: #dc2626; /* red-600 */
    font-size: 13px;
    margin-top: -8px;
    margin-bottom: 12px;
    font-weight: 600;
}

/* Submit button */
.btn-submit {
    background-color: #3b82f6;
    color: white;
    padding: 12px 22px;
    font-size: 16px;
    border: none;
    border-radius: 7px;
    cursor: pointer;
    font-weight: 700;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #2563eb; /* darker blue */
}

/* Inline form (date picker) */
form.form-inline {
    max-width: 300px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0;
    background: transparent;
    box-shadow: none;
}

form.form-inline label {
    margin: 0;
    font-weight: 500;
    color: #444;
}

form.form-inline input[type="date"] {
    padding: 8px 10px;
    font-size: 14px;
    border-radius: 5px;
}

</style>
@section('footer')
    <x-footer />
@endsection
