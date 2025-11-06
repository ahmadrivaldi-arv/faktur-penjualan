<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Faktur;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function __invoke()
    {
        /**
         * Mengambil jumlah semua data customer di database
         */
        $totalCustomer = Customer::count();
        /**
         * Mengambil jumlah semua data produk di database
         */
        $totalProduk = Produk::count();
        /**
         * Mengambil jumlah semua data penjualan di database
         */
        $totalPenjualan = Faktur::count();
        /**
         * Mengambil penjualan terbaru sebanyak 5 data
         */
        $recentPenjualan = Faktur::with('customer')->orderByDesc('created_at')->take(5)->get();
        /**
         * Mengambil data produk terlaris
         */
        $produkTerlaris = Produk::withSum('detailFakturs as total_qty', 'qty')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();
        /**
         * Mengambil total nilai grand total semua faktur
         */
        $nilaiTotalPenjualan = Faktur::sum('grand_total');

        return view('dashboard', compact(
            'totalCustomer',
            'totalProduk',
            'totalPenjualan',
            'recentPenjualan',
            'produkTerlaris',
            'nilaiTotalPenjualan'
        ));
    }
}
