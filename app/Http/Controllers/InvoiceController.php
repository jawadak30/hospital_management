<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function index()
    {
    $invoices = Invoice::with('patient')->latest()->paginate(10); // 10 items per page

        return view('invoices.print', compact('invoices'));
    }

    public function create()
    {
        $doctorId = Auth::user()->doctor->id;

        // Get patient IDs who have appointments with this doctor
        $patientIds = Appointment::where('doctor_id', $doctorId)
            ->pluck('patient_id')
            ->unique();

        // Retrieve those patients with their user info
        $patients = Patient::with('user')
            ->whereIn('id', $patientIds)
            ->get();

    return view('invoices.create', compact('patients'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,paid,canceled',
        ]);

        // Create the invoice with an empty path for now
        $invoice = Invoice::create([
            ...$data,
            'path' => '', // Temporarily empty
        ]);

        // Generate the PDF file name
        $fileName = uniqid('invoice_') . '.pdf';
        $filePath = 'uploads/' . $fileName; // relative path for public disk

        // Generate PDF content
        $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));

        // Save PDF to public disk (storage/app/public/uploads)
        Storage::disk('public')->put($filePath, $pdf->output());

        // Update the invoice with the public path
        $invoice->update(['path' => $filePath]);

        return back()->with('success', 'Invoice created successfully.');
    }


    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

public function edit(Invoice $invoice)
{
    $patients = Patient::with('user')->get(); // For dropdown
    return view('invoices.update', compact('invoice', 'patients'));
}


public function update(Request $request, Invoice $invoice)
{
    // Validate request
    $data = $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'amount' => 'required|numeric',
        'status' => 'required|in:pending,paid,canceled',
    ]);

    // Delete old PDF if it exists
    if ($invoice->path && Storage::disk('public')->exists($invoice->path)) {
        Storage::disk('public')->delete($invoice->path);
    }

    // Update the invoice with new data (without path for now)
    $invoice->update([
        ...$data,
        'path' => '', // Temporary to avoid overwriting before new PDF
    ]);

    // Generate new PDF filename and path
    $fileName = uniqid('invoice_') . '.pdf';
    $filePath = 'uploads/' . $fileName;

    // Create new PDF
    $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));

    // Store new PDF
    Storage::disk('public')->put($filePath, $pdf->output());

    // Update invoice with new path
    $invoice->update(['path' => $filePath]);

    return back()->with('success', 'Invoice updated successfully.');
}

    public function destroy(Invoice $invoice)
    {
        Storage::delete('public/' . $invoice->path);
        $invoice->delete();

        return back()->with('success', 'Invoice deleted.');
    }

    public function download(Invoice $invoice)
    {
        return response()->file(storage_path('app/public/' . $invoice->path));
    }

    public function print(Invoice $invoice)
    {
        return view('invoices.pdf', compact('invoice'));
    }
}
