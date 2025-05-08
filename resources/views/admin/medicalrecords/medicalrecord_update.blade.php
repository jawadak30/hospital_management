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
                            <h4 class="card-title">Update Medical Record</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Diagnosis Field -->
                            <div class="form-group">
                                <label for="diagnosis">Diagnosis</label>
                                <textarea name="diagnosis" id="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror">{{ old('diagnosis', $medicalRecord->diagnosis) }}</textarea>
                                @error('diagnosis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Treatment Field -->
                            <div class="form-group">
                                <label for="treatment">Treatment</label>
                                <textarea name="treatment" id="treatment" class="form-control @error('treatment') is-invalid @enderror">{{ old('treatment', $medicalRecord->treatment) }}</textarea>
                                @error('treatment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Patient Info (hidden as it's already linked) -->
                            <input type="hidden" name="patient_id" value="{{ $medicalRecord->patient_id }}">

                            <button type="submit" class="btn btn-primary">Update</button>
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
