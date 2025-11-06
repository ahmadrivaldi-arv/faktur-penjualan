<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanPdfController extends Controller
{
    public function __invoke(Faktur $faktur)
    {
        $faktur->load(['customer', 'perusahaan', 'details.produk']);

        $subtotal = $faktur->details->sum(fn ($detail) => $detail->qty * $detail->price);
        $ppnPercent = (int) $faktur->ppn;
        $ppnAmount = (int) $subtotal * ($ppnPercent / 100);
        $dpAmount = (int) $faktur->dp;
        $grandTotal = (int) $faktur->grand_total;

        $pdf = Pdf::loadView('pdf.faktur', [
            'faktur' => $faktur,
            'subtotal' => $subtotal,
            'ppnPercent' => $ppnPercent,
            'ppnAmount' => $ppnAmount,
            'dpAmount' => $dpAmount,
            'grandTotal' => $grandTotal,
        ])->setPaper('a4');

        return $pdf->stream("faktur-{$faktur->no_faktur}.pdf");
    }
}
