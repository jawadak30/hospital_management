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
                            <h4 class="card-title">update prescription</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Prescription Edit Form -->
                        <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Doctor -->
                            <div class="form-group">
                                <label for="doctor_id">doctor</label>
                                <input type="text" name="doctor_id" id="doctor_id" class="form-control" value="{{ $doctor->user->name }}" disabled>
                            </div>

                            <!-- Patient -->
                            <div class="form-group">
                                <label for="patient_id">patient</label>
                                <select name="patient_id" id="patient_id" class="form-control @error('patient_id') is-invalid @enderror">
                                    <option value="" disabled selected>select patient</option>
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

                            <!-- Medications + Dosages -->
                            <div class="form-group" id="medication-container">
                                <label>medication</label>
@foreach($prescription->items as $index => $item)
    <div class="row medication-row mb-3">
        <div class="col-md-5">
            <input type="text" name="medication[]" class="form-control @error('medication.' . $index) is-invalid @enderror"
                   value="{{ old('medication.' . $index, $item->medication) }}"
                   placeholder="medication">
            @error('medication.' . $index)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-5">
            <input type="text" name="dosage[]" class="form-control @error('dosage.' . $index) is-invalid @enderror"
                   value="{{ old('dosage.' . $index, $item->dosage) }}"
                   placeholder="dosage">
            @error('dosage.' . $index)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-medication-btn" style="width: 100%;">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>
@endforeach

                            </div>

                            <button type="button" class="btn btn-secondary" id="add-medication-btn">add medication</button>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary mt-3">{{ trans('mainTrans.update') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add new medication row
    document.getElementById('add-medication-btn').addEventListener('click', function () {
        const container = document.getElementById('medication-container');
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'medication-row', 'mb-3');
        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="medication[]" class="form-control" placeholder="medication">
            </div>
            <div class="col-md-5">
                <input type="text" name="dosage[]" class="form-control" placeholder="dosage">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-medication-btn" style="width: 100%;"><i class="fa-solid fa-trash"></i></button>
            </div>
        `;
        container.appendChild(newRow);
    });

    // Remove medication row
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-medication-btn')) {
            event.target.closest('.medication-row').remove();
        }
    });
</script>
@endsection

@section('settings')
    @include('admin.admin_components.settings')
@endsection
