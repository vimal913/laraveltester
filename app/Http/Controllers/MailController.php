<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller {
    
    public function sendEmail() {
        $email = 'vimaldg@yopmail.com';
   
        // $mailData = [
        //     'name' => 'Test Name',
        //     'dob' => '22/04/1998'
        // ];
        $data = [
            'subject' => 'Test Name',
            'body' => 'Hello this is from laravel'
        ];
    //     Mail::to($email)->send(new MailNotify($data));
    // return response()->json([
    //         'message' => 'Email has been sent.']);
  try {
    Mail::to($email)->send(new MailNotify($data));
    return response()->json([
            'message' => 'Email has been sent.']);
  } catch (\Exception $th) {
    return response()->json([
        'message' => 'Something Went Wrong']);
  }
        // Mail::to($email)->send(new MailNotify($data));
        // dd("Mail Sent Successfully");
   
        // return response()->json([
        //     'message' => 'Email has been sent.'
        // ], Response::HTTP_OK);
    }
}