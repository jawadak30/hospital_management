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
                            <h4 class="card-title">{{ trans('mainTrans.add_bed') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('beds.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Occupied Field -->
                            <div class="form-group">
                                <label for="occupied">occupied</label>
                                <select name="occupied" id="occupied" class="form-control @error('occupied') is-invalid @enderror">
                                    <option value="0" {{ old('occupied') == 0 ? 'selected' : '' }}>no</option>
                                    <option value="1" {{ old('occupied') == 1 ? 'selected' : '' }}>yes</option>
                                </select>
                                @error('occupied')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ trans('mainTrans.add_bed') }}</button>
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

