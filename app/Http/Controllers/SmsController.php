<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Services\SmsCentralService;

class SmsController extends Controller
{

    public function index() {
        return view('sms.index');
    }

    public function send(SmsCentralService $smsCentralService, Request $request) {
        $response = $smsCentralService->sendSms();
        
        return view('sms.send', ['response' => $response]);
    }
}
