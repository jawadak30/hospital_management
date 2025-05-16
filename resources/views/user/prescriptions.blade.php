@extends('base')

@section('header')
    <x-header />
@endsection

@section('section')
<div class="container mt-4">

    <h2 class="mb-4">Medical Record</h2>

    @if ($medicalRecord)
        <div class="card mb-4 p-3 shadow-sm border-left-info medical-record">
            <p><strong>Diagnosis:</strong> {{ $medicalRecord->diagnosis }}</p>
            <p><strong>Treatment:</strong> {{ $medicalRecord->treatment }}</p>
            <p><strong>Date:</strong> {{ $medicalRecord->created_at->format('Y-m-d') }}</p>
        </div>
    @else
        <div class="alert alert-info">There is no medical record available at the moment.</div>
    @endif

    <h2 class="mb-4">Prescriptions</h2>

    @if ($prescriptions->isEmpty())
        <div class="alert alert-warning">No prescriptions found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Doctor</th>
                        <th>Medications</th>
                        <th>Dosages</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->id }}</td>
                            <td>{{ $prescription->doctor->user->name ?? 'N/A' }}</td>
                            <td>
                                @foreach ($prescription->items as $item)
                                    <div>{{ $item->medication }}</div>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($prescription->items as $item)
                                    <div>{{ $item->dosage }}</div>
                                @endforeach
                            </td>
                            <td>{{ $prescription->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

@section('footer')
    <x-footer />
@endsection
