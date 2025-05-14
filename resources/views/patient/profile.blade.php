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
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
        width: 10px;
        height: 10px;
        border: 1px solid #2260FF;
        border-radius: 50%;
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
        font-size: 14px;
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

        .meta-item {
            font-size: 10px;
        }

        .section-title {
            font-size: 14px;
        }

        .section-content {
            font-size: 12px;
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
                <img class="doctor-image" src="https://placehold.co/200x200" alt="Doctor Photo">
            </div>

            <div class="doctor-info">
                <h2 class="doctor-name">{{ $doctor->user->name }}</h2>
                <p class="doctor-specialty">{{ $doctor->specialization }}</p>

                <div class="doctor-meta">
                    <div class="meta-item">
                        <i></i> 5 reviews
                    </div>
                    <div class="meta-item">
                        <i></i> 4.5 rating
                    </div>
                    <div class="meta-item">
                        <i></i>
                        {{ $doctor->availability ? 'Available: Mon-Sat / 9-5' : 'Not Available' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h3 class="section-title">Profile</h3>
            <p class="section-content">
                This is a placeholder. You can add a `profile` column to the `doctors` table if needed.
            </p>
        </div>

        <!-- Additional sections... -->
    </div>
@endsection


@section('footer')
    <x-footer />
@endsection
