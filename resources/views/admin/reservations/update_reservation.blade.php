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
                            <h4 class="card-title">{{ trans('mainTrans.update') }} Appointment</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (auth()->user()->isDoctor())
                        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                        @endif
                        @if (auth()->user()->isSecretary())
                        <form action="{{ route('secretary.appointments.update', $appointment->id) }}" method="POST">
                        @endif
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="appointment_date">Appointment Date</label>
                                <input type="datetime-local" id="appointment_date" name="appointment_date"
                                class="form-control"
                                value="{{ old('appointment_date', \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i')) }}"
                                min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                @error('appointment_date')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="canceled" {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                                @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update Appointment</button>
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

