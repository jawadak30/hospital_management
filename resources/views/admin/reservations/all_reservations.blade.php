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
                        <h4 class="card-title">Reservations</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-datatable-entries">
                        @php use Illuminate\Support\Carbon; @endphp
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ trans('mainTrans.appointment_date') }}</th>
                                    <th>{{ trans('mainTrans.status') }}</th>
                                    <th>{{ trans('mainTrans.patient') }}</th>
                                    <th>{{ trans('mainTrans.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ Carbon::parse($appointment->appointment_date)->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <span class="badge
                                            @if($appointment->status == 'scheduled') bg-warning
                                            @elseif($appointment->status == 'completed') bg-success
                                            @elseif($appointment->status == 'canceled') bg-danger
                                            @endif">
                                            {{ trans("mainTrans." . $appointment->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $appointment->patient->user->name }}</td>
                                    <td>
                                        <!-- Update Button -->
                                        <form action="{{ route('appointments.edit', $appointment->id) }}" method="GET" style="display: inline;">
                                            <button type="submit" class="btn btn-primary btn-sm">{{ trans('mainTrans.update') }}</button>
                                        </form>

                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $appointment->id }}">
                                            {{ trans('mainTrans.delete') }}
                                        </button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $appointment->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $appointment->id }}">
                                                    {{ trans('mainTrans.confirm_delete') }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ trans('mainTrans.delete_appointment_confirmation') }}<br>
                                                {{ trans('mainTrans.appointment_date') }}: {{ Carbon::parse($appointment->appointment_date)->format('Y-m-d H:i') }}<br>
                                                {{ trans('mainTrans.patient') }}: {{ $appointment->patient->user->name ?? 'N/A' }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    {{ trans('mainTrans.canceled') }}
                                                </button>
                                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ trans('mainTrans.delete') }}
                                                    </button>
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

