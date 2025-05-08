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
                            <h4 class="card-title">Update Bed</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('beds.update', $bed->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Patient Field -->
                            <div class="form-group">
                                <label for="patient_id">Patient</label>
                                <select name="patient_id" id="patient_id" class="form-control @error('patient_id') is-invalid @enderror">
                                    <option value="">Select Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ old('patient_id', $bed->patient_id) == $patient->id ? 'selected' : '' }}>{{ $patient->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Occupied Field -->
                            <div class="form-group">
                                <label for="occupied">Occupied</label>
                                <!-- Hidden input to send 'false' when unchecked -->
                                <input type="hidden" name="occupied" value="0">
                                <!-- Checkbox to send '1' when checked -->
                                <input type="checkbox" name="occupied" id="occupied" class="form-check-input @error('occupied') is-invalid @enderror"
                                       value="1" {{ old('occupied', $bed->occupied) ? 'checked' : '' }}>
                                @error('occupied')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Bed</button>
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

