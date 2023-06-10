<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\User;
use App\Models\Cart;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{
    /**
     * Payment view
     */
    public function index()
    {
        return view('stripe-payment');
    }

    public function charge(Request $request)
    {
        try {
            $getuserdata = User::where('id', Session::get('id'))->first();

            if ($request->order_type == "2") {
                $delivery_charge = "0.00";
                $address = 'New York, NY, USA';
                $lat = '40.7127753';
                $lang = '-74.0059728';
                $building = "";
                $landmark = "";
                $pincode = '10001';
                $city = '';
                $state = '';
                $country = '';
                $order_total = $request->order_total - $request->delivery_charge;
            } else {
                $delivery_charge = $request->delivery_charge;
                $building = $request->building;
                $landmark = $request->landmark;
                $order_total = $request->order_total;
                    $city =  $request->city;
                    $state = $request->state;
                    $country = $request->country;
                    $pincode = $request->postal_code;
                    $address =  $request->address;
                
            }

            if ($request->discount_amount == "NaN") {
                $discount_amount = "0.00";
            } else {
                $discount_amount = $request->discount_amount;
            }

            $getpaymentdata = Payment::select('test_secret_key', 'live_secret_key', 'environment')->where('payment_name', 'Stripe')->first();

            if ($getpaymentdata->environment == '1') {
                $stripe_secret = $getpaymentdata->test_secret_key;
            } else {
                $stripe_secret = $getpaymentdata->live_secret_key;
            }

            Stripe::setApiKey($stripe_secret);

            $customer = Customer::create([
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken,
                'name' => $getuserdata->name,
                'address' => [
                    'line1' => $address,
                    'postal_code' => $pincode,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                ],
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $order_total * 100,
                'currency' => 'usd',
                'description' => 'Food Service',
            ]);

            $order_number = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 10)), 0, 10);
try {
    $order = new Order;
    $order->order_number = $order_number;
    $order->user_id = Session::get('id');
    $order->order_total = $order_total;
    $order->razorpay_payment_id = $charge['id'];
    $order->payment_type = '2';
    $order->status = '1';
    $order->address = $address;
    $order->promocode = $request->promocode;
    $order->discount_amount = $discount_amount;
    $order->discount_pr = $request->discount_pr;
    $order->tax = $request->tax;
    $order->tax_amount = $request->tax_amount;
    $order->delivery_charge = $delivery_charge;
    $order->order_type = $request->order_type;
    $order->lat = $request->lat;
    $order->lang = $request->lang;
    $order->building = $building;
    $order->landmark = $landmark;
    $order->pincode = $pincode;
    $order->order_notes = $request->notes;
    $order->order_from = 'web';
    $order->save();
    
    // Log debug information to the laravel.log file
    \Illuminate\Support\Facades\Log::debug('Order saved successfully: ' . $order);

    // Rest of your code...
} catch (\Exception $ex) {
    // Log the error to the laravel.log file
    \Illuminate\Support\Facades\Log::error($ex->getMessage());

    // Return an error response or handle the error as per your requirements
    return response()->json(['status' => 0, 'message' => 'Something went wrong. Please try again...'], 500);
}


            $order_id = $order->id;
            $data = Cart::where('cart.user_id', Session::get('id'))->get();

            foreach ($data as $value) {
                $OrderPro = new OrderDetails;
                $OrderPro->order_id = $order_id;
                $OrderPro->user_id = $value['user_id'];
                $OrderPro->item_id = $value['item_id'];
                $OrderPro->price = $value['price'];
                $OrderPro->qty = $value['qty'];
                $OrderPro->item_notes = $value['item_notes'];
                $OrderPro->save();
            }

            Cart::where('user_id', Session::get('id'))->delete();
            $count = Cart::where('user_id', Session::get('id'))->count();

            try {
                $ordermessage = 'Order "' . $order_number . '" has been placed';
                $email = $getuserdata->email;
                $name = $getuserdata->name;
                $data = ['ordermessage' => $ordermessage, 'email' => $email, 'name' => $name];

                Mail::send('Email.orderemail', $data, function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['ordermessage']);
                });
            } catch (\Swift_TransportException $e) {
                $response = $e->getMessage();
                return response()->json(['status' => 0, 'message' => 'Something went wrong while sending email. Please try again...'], 200);
            }

            Session::put('cart', $count);

            session()->forget(['offer_amount', 'offer_code']);

            return response()->json(['status' => 1, 'message' => 'Order has been placed'], 200);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
