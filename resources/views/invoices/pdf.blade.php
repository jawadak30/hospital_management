<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #555;
            line-height: 1.6;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 40px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-header h2 {
            margin: 0;
            color: #333;
        }
        .invoice-details p {
            margin: 4px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        table th {
            background-color: #f7f7f7;
            font-weight: bold;
        }
        .total-row td {
            border-top: 2px solid #eee;
            font-weight: bold;
            font-size: 1.1em;
        }
        .status {
            margin-top: 30px;
            font-size: 1em;
        }
        .status span {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="invoice-header">
            <h2>Hospital Invoice</h2>
            <div class="invoice-details">
                <p><strong>Invoice ID:</strong> #{{ $invoice->id }}</p>
                <p><strong>Date:</strong> {{ $invoice->created_at->format('Y-m-d') }}</p>
            </div>
        </div>

        <div>
            <p><strong>Patient:</strong> {{ $invoice->patient->user->name }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount (USD)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Medical Service</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td>Total</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="status">
            <p><strong>Status:</strong> <span>{{ ucfirst($invoice->status) }}</span></p>
        </div>
    </div>
</body>
</html>
