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
                        <h4 class="card-title">Medical Records</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-datatable-entries">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Patient</th>
                                    <th>Diagnosis</th>
                                    <th>Treatment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicalRecords as $record)
                                <tr>
                                    <td>{{ $record->id }}</td>
                                    <td>{{ $record->patient->user->name ?? 'N/A' }}</td>
                                    <td>{{ $record->diagnosis }}</td>
                                    <td>{{ $record->treatment }}</td>
                                    <td>
                                        <!-- Edit Medical Record -->
                                        <a href="{{ route('medical_records.edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <!-- View Prescriptions -->
                                        <a href="{{ route('prescriptions.patient', $record->patient_id) }}" class="btn btn-info btn-sm">Prescriptions</a>

                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $record->id }}">Delete</button>
                                    </td>

                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $record->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $record->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $record->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this medical record?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('medical_records.destroy', $record->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
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
