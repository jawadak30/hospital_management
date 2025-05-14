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
                    <div class="custom-datatable-entries">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Medication</th>
                                    <th>Dosage</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->id }}</td>
                                    <td>{{ $prescription->doctor->user->name ?? 'N/A' }}</td>
                                    <td>{{ $prescription->patient->user->name ?? 'N/A' }}</td>
                                    <td>
                                        @foreach($prescription->items as $item)
                                            <div>{{ $item->medication }}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($prescription->items as $item)
                                            <div>{{ $item->dosage }}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Update Button -->
                                        <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $prescription->id }}">Delete</button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $prescription->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $prescription->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $prescription->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this prescription?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST">
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
