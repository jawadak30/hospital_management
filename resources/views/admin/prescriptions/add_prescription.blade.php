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

                            <!-- Medication -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="medication">Médicaments</label>
                                    <textarea name="medication" class="form-control @error('medication') is-invalid @enderror" rows="3">{{ old('medication') }}</textarea>
                                    @error('medication')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Dosage -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="dosage">Dosage</label>
                                    <textarea name="dosage" class="form-control @error('dosage') is-invalid @enderror" rows="2">{{ old('dosage') }}</textarea>
                                    @error('dosage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ajouter l'ordonnance</button>
                            </div>
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
