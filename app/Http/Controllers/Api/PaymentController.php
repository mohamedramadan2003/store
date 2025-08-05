<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nafezly\Payments\Classes\FawryPayment;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $payment = new FawryPayment();
        $response = $payment->pay(
            amount: $request->amount,
            user_id: $request->user_id,
            user_first_name: $request->first_name,
            user_last_name: $request->last_name,
            user_email: $request->email,
            user_phone: $request->phone
        );

        return response()->json($response);
    }

    public function verify(Request $request)
    {
        $payment = new FawryPayment();
        $response = $payment->verify($request);

        return response()->json($response);
    }
}
