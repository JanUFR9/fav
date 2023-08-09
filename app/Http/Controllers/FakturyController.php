<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakturyController extends Controller
{
    public function index()
    {
        $invoiceNumbers = $this->generateInvoiceNumbers();

        return view('invoice.index', ['invoiceNumbers' => $invoiceNumbers]);
    }

    private function generateInvoiceNumbers()
    {
        $today = Carbon::now()->format('d/m/y');
        $cacheKey = 'invoice_numbers_' . $today;

        $invoiceNumbers = Cache::remember($cacheKey, Carbon::tomorrow(), function () {
            $lastNumber = Cache::get('last_invoice_number', 0);
            $numbers = [];

            for ($i = 1; $i <= 5; $i++) {
                $numbers[] = 'FAV/' . ++$lastNumber . '/' . Carbon::now()->format('d/m/y');
            }

            Cache::put('last_invoice_number', $lastNumber);

            return $numbers;
        });

        return $invoiceNumbers;
    }
}
