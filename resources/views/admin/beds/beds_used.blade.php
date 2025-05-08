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
                        <h4 class="card-title">Used Beds</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-datatable-entries">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Bed ID</th>
                                    <th>Patient Name</th>
                                    <th>Patient Email</th>
                                    <th>Occupied Since</th>
                                    <th>{{ trans('mainTrans.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beds as $bed)
                                <tr>
                                    <td>{{ $bed->id }}</td>
                                    <td>{{ $bed->patient->user->name  }}</td>
                                    <td>{{ $bed->patient->user->email }}</td>

                                    <td>{{ $bed->updated_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <!-- Update Button -->
                                        <form action="{{ route('beds.edit', $bed->id) }}" method="GET" style="display: inline;">
                                            <button type="submit" class="btn btn-primary btn-sm">{{ trans('mainTrans.update') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($beds->isEmpty())
                            <div class="text-center text-muted mt-3">
                                No occupied beds found.
                            </div>
                        @endif
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

