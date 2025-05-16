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
                            <h4 class="card-title">{{ trans('mainTrans.update_category') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">

<form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="patient_id">{{ __('Patient') }}</label>
        <select name="patient_id" id="patient_id" class="form-control @error('patient_id') is-invalid @enderror">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ old('patient_id', $invoice->patient_id) == $patient->id ? 'selected' : '' }}>
                    {{ $patient->user->name ?? 'Unnamed' }}
                </option>
            @endforeach
        </select>
        @error('patient_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="amount">{{ __('Amount') }}</label>
        <input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror"
               value="{{ old('amount', $invoice->amount) }}">
        @error('amount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">{{ __('Status') }}</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
            @foreach(['pending', 'paid', 'canceled'] as $status)
                <option value="{{ $status }}" {{ old('status', $invoice->status) == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Update Invoice') }}</button>
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

