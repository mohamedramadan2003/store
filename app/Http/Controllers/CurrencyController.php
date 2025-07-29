<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{public function convert(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric',
        'from' => 'required|string',
        'to' => 'required|string',
    ]);

    $amount = $request->amount;
    $from = strtoupper($request->from);
    $to = strtoupper($request->to);

    try {
        $response = Http::get("https://api.frankfurter.app/latest", [
            'from' => $from,
            'to' => $to,
            'amount' => $amount
        ]);

        if (!$response->ok() || !isset($response['result'])) {
            return response()->json([
                'error' => 'Conversion failed',
                'debug' => $response->json(),
            ], 500);
        }

        return response()->json([
            'converted_amount' => round($response['result'], 2),
            'converted_currency' => $to,
            'original_amount' => $amount,
            'original_currency' => $from,
            'exchange_rate' => $response['info']['rate'],
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Exception: ' . $e->getMessage()
        ], 500);
    }
}

}
