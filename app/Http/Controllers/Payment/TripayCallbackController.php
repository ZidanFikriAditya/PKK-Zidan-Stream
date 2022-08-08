<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TripayCallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'NcfUw-zftY4-mG24d-2TwRb-oE7sz';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return 'Invalid signature';
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return 'Invalid callback event, no action was taken';
        }

        $data = json_decode($json);
        $reference = $data->reference;
        $status = strtoupper((string) $data->status);

        // expired date
        $package_id = Transaction::where('reference', $reference)->pluck('package_id')->first();
        $curdate = DB::table('packages')->where('id', $package_id)->pluck('jangka_waktu')->first();
        $curdate = Carbon::now()->addDay($curdate)->format('Y-m-d');
        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk closed payment
        |--------------------------------------------------------------------------
        */
        if (1 === (int) $data->is_closed_payment) {
            $transaction = Transaction::where('reference', $reference)->first();

            if (! $transaction) {
                return 'No invoice found for this unique ref: ' . $reference;
            }

            $transaction->update(['status' => $status, 'expired' => $curdate]);
            return response()->json(['success' => true]);
        }


        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk open payment
        |--------------------------------------------------------------------------
        */
        $transaction = Transaction::where('reference', $reference)
            ->where('status', 'UNPAID')
            ->first();

        if (! $transaction) {
            return 'Invoice not found or current status is not UNPAID';
        }

        if ((int) $data->total_amount !== (int) $transaction->total_amount) {
            return 'Invalid amount, Expected: ' . $transaction->total_amount . ' - Received: ' . $data->total_amount;
        }
        

        switch ($data->status) {
            case 'PAID':
                $transaction->update(['status' => 'PAID']);
                return response()->json(['success' => true]);

            case 'EXPIRED':
                $transaction->update(['status' => 'UNPAID']);
                return response()->json(['success' => true]);

            case 'FAILED':
                $transaction->update(['status' => 'UNPAID']);
                return response()->json(['success' => true]);

            default:
                return response()->json(['error' => 'Unrecognized payment status']);
        }
    }
}
