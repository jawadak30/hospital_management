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
                        <h4 class="card-title">Beds</h4>
                    </div>
                    <a href="{{ route('beds.create') }}" class="btn btn-primary btn-sm">Add Bed</a>
                </div>
                <div class="card-body">
                    <div class="custom-datatable-entries">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>bed number</th>
                                    <th>Patient</th>
                                    <th>occupied</th>
                                    <th>{{ trans('mainTrans.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beds as $bed)
                                <tr>
                                    <td>{{ $bed->id }}</td>
                                    <td>
                                        @if($bed->patient)
                                            {{ $bed->patient->name }}
                                        @else
                                            no patient assigned
                                        @endif
                                    </td>
                                    <td>{{ $bed->occupied ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <!-- Update Button -->
                                        <form action="{{ route('beds.edit', $bed->id) }}" method="GET" style="display: inline;">
                                            <button type="submit" class="btn btn-primary btn-sm">{{ trans('mainTrans.update') }}</button>
                                        </form>

                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $bed->id }}">{{ trans('mainTrans.delete') }}</button>
                                    </td>
                                </tr>

                                <!-- Delete Modal for each bed -->
                                <div class="modal fade" id="deleteModal{{ $bed->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $bed->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $bed->id }}">{{ trans('mainTrans.confirm_delete') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                delete "{{ $bed->id }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('mainTrans.canceled') }}</button>
                                                <form action="{{ route('beds.destroy', $bed->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">{{ trans('mainTrans.delete') }}</button>
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

