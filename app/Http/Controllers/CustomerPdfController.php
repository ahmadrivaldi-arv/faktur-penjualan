<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CustomerPdfController extends Controller
{
    public function __invoke(Request $request)
    {
        $customers = Customer::orderBy('nama_customer')->get();

        $pdf = Pdf::loadView('pdf.customer', compact('customers'));

        if ($request->boolean('download')) {
            return $pdf->download('data-customer.pdf');
        }

        return $pdf->stream('data-customer.pdf');
    }
}
