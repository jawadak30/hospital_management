@extends('base')

@section('header')
    <x-header />
@endsection

@section('section')

<style>
    /* Simple custom modal styles */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    }

    .custom-modal-content {
        background: #fff;
        padding: 20px;
        width: 90%;
        max-width: 400px;
        border-radius: 8px;
        text-align: center;
    }

    .custom-modal .modal-actions {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
</style>

<div class="container my-4">
    <h2 style="font-size: 15px; padding: 10px;">Your Appointments</h2>

    @if ($appointments->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->doctor->user->name }}</td>
                            <td>{{ $appointment->doctor->specialization }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y - g:i A') }}</td>
                            <td>{{ ucfirst($appointment->status) }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="openModal({{ $appointment->id }})">Delete</button>
                            </td>
                        </tr>

                        <!-- Simple modal -->
                        <div class="custom-modal" id="modal-{{ $appointment->id }}">
                            <div class="custom-modal-content">
                                <h5>Are you sure you want to delete this appointment?</h5>
                                <div class="modal-actions">
                                    <button onclick="closeModal({{ $appointment->id }})">Cancel</button>
                                    <form action="{{ route('patient.appointments.destroy', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $appointments->links() }}
    @else
        <p class="alert alert-info">No appointments found.</p>
    @endif
</div>

<script>
    function openModal(id) {
        document.getElementById(`modal-${id}`).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).style.display = 'none';
    }

    // Optional: close modal on background click
    document.querySelectorAll('.custom-modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    });
</script>

@endsection

@section('footer')
    <x-footer />
@endsection
