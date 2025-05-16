<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
 body {
    font-family: 'DejaVu Sans', sans-serif, Arial, sans-serif;
    color: #444;
    background-color: #f5f7fa;
    margin: 0;
    padding: 0;
}

.invoice-box {
    max-width: 850px;
    margin: 40px auto;
    padding: 30px 50px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    border: 1px solid #dde2e6;
}

.invoice-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 3px solid #0d6efd;
    padding-bottom: 15px;
    margin-bottom: 30px;
}

.invoice-header h2 {
    margin: 0;
    color: #0d6efd;
    font-weight: 700;
    font-size: 30px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.invoice-details p {
    margin: 0.3rem 0;
    font-size: 15px;
    color: #555;
}

.invoice-details strong {
    color: #222;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    font-size: 16px;
}

table thead tr {
    background-color: #e7f1ff;
}

table th, table td {
    padding: 14px 12px;
    border-bottom: 1px solid #dee2e6;
    text-align: left;
    vertical-align: middle;
}

table th {
    color: #0d6efd;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

table td {
    color: #444;
}

.total-row td {
    border-top: 2px solid #0d6efd;
    font-weight: 700;
    background-color: #f8fbff;
    font-size: 18px;
}

.status {
    margin-top: 40px;
    font-size: 16px;
    text-align: right;
}

.status strong {
    font-weight: 700;
    padding: 6px 15px;
    border-radius: 6px;
    background-color: #cfe2ff;
    color: #0d6efd;
    display: inline-block;
}

.fs-sm {
    font-size: 0.9rem;
    color: #666;
}

.me-3 {
    margin-right: 1rem !important;
}

.text-success {
    color: #198754 !important;
}

/* Responsive */
@media (max-width: 576px) {
    .invoice-box {
        padding: 20px 25px;
    }
    .invoice-header {
        flex-direction: column;
        gap: 10px;
    }
    .text-md-end {
        text-align: left !important;
    }
}

</style>

</head>
<body>
<div class="container mt-6 mb-7">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-body p-5">
                    <h2>Hospital Invoice</h2>
                    <p class="fs-sm">
                        This is the invoice for a payment of <strong>${{ number_format($invoice->amount, 2) }}</strong> (USD)
                        made by <strong>{{ $invoice->patient->user->name }}</strong>.
                    </p>

                    <div class="border-top border-gray-200 pt-4 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted mb-2">Invoice ID</div>
                                <strong>#{{ $invoice->id }}</strong>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="text-muted mb-2">Date</div>
                                <strong>{{ $invoice->created_at->format('Y-m-d') }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="border-top border-gray-200 mt-4 py-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted mb-2">Patient Name</div>
                                <strong>{{ $invoice->patient->user->name }}</strong>
                                <p class="fs-sm">
                                    {{ $invoice->patient->user->email ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="text-muted mb-2">Status</div>
                                <strong class="text-capitalize">{{ $invoice->status }}</strong>
                            </div>
                        </div>
                    </div>

                    <table class="table border-bottom border-gray-200 mt-3">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Description</th>
                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-0">Medical Service</td>
                                <td class="text-end px-0">${{ number_format($invoice->amount, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-5">
                        <div class="d-flex justify-content-end mt-3">
                            <h5 class="me-3">Total:</h5>
                            <h5 class="text-success">${{ number_format($invoice->amount, 2) }} USD</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
