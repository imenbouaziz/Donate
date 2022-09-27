<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Auth;

class DonationController extends Controller
{

    public function makeDonation(Request $request, $id) {
        $current_campaign = Campaign::where('id', $id)->first();
        $request->session()->put('donatedCampaign', $current_campaign);
        $role = session::get('user')->role;

        return view('make-donation', ['current_campaign' => $current_campaign], compact('role', 'id'));
    }

    public function donate(Request $request, $id) {

        $current_campaign = Campaign::find($id);
        $donation = new Donation();
        $donation->email = $request->email;
        $donation->invoice_to = $request->input('invoice_to');
        $donation->phone = $request->input('phone');
        $donation->address = $request->input('address');
        $donation->note = $request->input('note');
        $donation->amount = $request->input('amount');
        $donation->author_id = session::get('user')->id;
        $donation->campaign_id = $id;
        $donation->save();
        $role = session::get('user')->role;

        // Saving sum of donated amount to the campaign table
        $current_campaign->donated_amount += $donation->amount;
        $current_campaign->save();

        $client = new GuzzleHttpClient();
        $res = $client->request('POST', "https://test-api.slick-pay.com/api/invoices/payment/generateInvoice",[
            'headers' => [
                'Accept'     => 'application/json',
                'Authorization' => 'Bearer 5|6itxL9D8tf1Fw2vnfcxyTdvmayD9er3mFZv3LzHF'
            ],
            'form_params' => [
                'invoice_to' => $request->input('invoice_to'),
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'note' => $request->note,
                'amount' => $request->amount,
                'items' => [
                    ['product_name' => 'donate',
                    'product_price' =>'1',
                    'product_qty' => '1',
                    'product_amount' => '1',]
                ],
                'returnUrl'=> 'http://127.0.0.1:8000/confirm-donation',
            ]]
            );

            if ($res->getBody()) {
                $body = json_decode($res->getBody());
                if ($body->errors != 0) {
                    return ['error' => true ,'errMessage' => $body->errorMessage];
                }
                else
                   {
                    $data['invoiceNum'] = $body->data->invoiceNum;
                    $donation->fill($data);
                    $donation->save();
                    return redirect(url($body->data->url));
                }

        }}


        public function confirm(Request $request)
    {
        // $invoiceNum = "eyJpdiI6Ikg2V2tsRkJ0bVNERjhCMm5oa1lYcmc9PSIsInZhbHVlIjoibCtmY0JkalVJMUJaVG4vamdtazlwaEs3ZXdXSFJNbmxBVVdZVWxwc0dZUT0iLCJtYWMiOiIyYjgwM2UwZmU5Mjc3OTI1NzI5YWM1MDhlOWE5MzY2OTA4ZjEzYzRjNTIyZmJkMGVmZTgwNmRkOGZiNjU1YWM0IiwidGFnIjoiIn0=";
        $invoiceNum = $request->get('invoiceNum');
        //dd($invoiceNum);
       //$current_campaign = Campaign::find($id);

        $clientConfirm = new GuzzleHttpClient();
        $resConfirm = $clientConfirm->request('GET', "https://test-api.slick-pay.com/api/invoices/payment/checkPayment/".$invoiceNum , [
            'headers' => [
                'Accept'     => 'application/json',
                'Authorization' => 'Bearer 5|6itxL9D8tf1Fw2vnfcxyTdvmayD9er3mFZv3LzHF'
            ]
        ]);
        if ($resConfirm->getBody()) {

            $bodyConfirm  = json_decode($resConfirm ->getBody());
            if ($bodyConfirm->errors != 0) {
                return ['error' => true ,'errMessage' => $bodyConfirm->errorMessage];
            }
            else
            {
                // Saving sum of donated amount to the campaign table
               // $current_campaign->donated_amount += $bodyConfirm->amount;
              //  $current_campaign->save();
                $role = session::get('user')->role;
               // return $bodyConfirm;
               return view('confirm-donation', compact('role'));
            }

        }
    }


    public function myDonations(Request $request) {
       // $campaign_name=session::get('campaign')->campaign_name;
        $role = session::get('user')->role;
        $donations = Donation::where('author_id', session('user')->id)->get();
          //$donations = Donation::all();
         // return view('my-donations', ['donation' => $donation, '']);
        // return view('my-donations', compact('donations'));
       return view('my-donations', compact('donations', 'role'));
    }
}
