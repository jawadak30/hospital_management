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
                            <h4 class="card-title">Ajouter une ordonnance</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('prescriptions.store') }}" method="POST">
                            @csrf

                            <!-- Patient Selection -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="patient_id">Patient</label>
                                    <select name="patient_id" id="patient_id" class="form-select @error('patient_id') is-invalid @enderror">
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">
                                                {{ $patient->user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Medications (Multiple) -->
                            <div id="medication-fields">
                                <div class="row medication-item">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="medication[]">Médicament</label>
                                        <input type="text" name="medication[]" class="form-control @error('medication.*') is-invalid @enderror" value="{{ old('medication.0') }}">
                                        @error('medication.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="dosage[]">Dosage</label>
                                        <input type="text" name="dosage[]" class="form-control @error('dosage.*') is-invalid @enderror" value="{{ old('dosage.0') }}">
                                        @error('dosage.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Add Medication Button -->
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-secondary" id="add-medication">Ajouter un médicament</button>
                                </div>
                            </div> --}}

                            <!-- Submit -->
                            <div class="form-group"  style="    display: flex
;
    justify-content: space-between;
    width: 62%;
    align-items: center;">
                                                                <div class="col-md-12">
                                    <button type="button" class="btn btn-secondary" id="add-medication">Ajouter un médicament</button>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter l'ordonnance</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-medication').addEventListener('click', function () {
        // Create new medication input fields
        const medicationFields = document.getElementById('medication-fields');
        const newItem = document.createElement('div');
        newItem.classList.add('row', 'medication-item');
        newItem.innerHTML = `
            <div class="col-md-6 mb-3">
                <label class="form-label" for="medication[]">Médicament</label>
                <input type="text" name="medication[]" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" for="dosage[]">Dosage</label>
                <input type="text" name="dosage[]" class="form-control">
            </div>
        `;
        medicationFields.appendChild(newItem);
    });
</script>

@endsection


@section('settings')
    @include('admin.admin_components.settings')
@endsection
