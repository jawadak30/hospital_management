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
                            <h4 class="card-title">{{ trans('mainTrans.update_prescription') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Prescription Edit Form -->
                        <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Doctor (auto-filled for authenticated doctor) -->
                            <div class="form-group">
                                <label for="doctor_id">{{ trans('mainTrans.doctor') }}</label>
                                <input type="text" name="doctor_id" id="doctor_id" class="form-control" value="{{ $doctor->user->name }}" disabled>
                            </div>

                            <!-- Patient Selection (related to appointments with the authenticated doctor) -->
                            <div class="form-group">
                                <label for="patient_id">{{ trans('mainTrans.patient') }}</label>
                                <select name="patient_id" id="patient_id" class="form-control @error('patient_id') is-invalid @enderror">
                                    <option value="" disabled selected>{{ trans('mainTrans.select_patient') }}</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ $prescription->patient_id == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Medication Field -->
                            <div class="form-group">
                                <label for="medication">{{ trans('mainTrans.medication') }}</label>
                                <textarea name="medication" id="medication" class="form-control @error('medication') is-invalid @enderror">{{ old('medication', $prescription->medication) }}</textarea>
                                @error('medication')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dosage Field -->
                            <div class="form-group">
                                <label for="dosage">{{ trans('mainTrans.dosage') }}</label>
                                <textarea name="dosage" id="dosage" class="form-control @error('dosage') is-invalid @enderror">{{ old('dosage', $prescription->dosage) }}</textarea>
                                @error('dosage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ trans('mainTrans.update') }}</button>
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
