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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Prescriptions</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if($prescriptions->isEmpty())
                        <p>No prescriptions found for this patient.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Medication</th>
                                    <th>Dosage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->id }}</td>
                                        <td>{{ $prescription->medication }}</td>
                                        <td>{{ $prescription->dosage }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('settings')
@include('admin.admin_components.settings')
@endsection
