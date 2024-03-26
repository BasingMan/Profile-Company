<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function main(Request $request)
    {  
        try{
            Mail::to('sekolahrpl5@gmail.com')->send(new ContactMail($request));
        
            return redirect()->back()->with('success', 'Email sent successfully');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
    }   }
}