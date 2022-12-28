<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Vimal");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('vimal.sasikumar@colanonline.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('vimaltech43@gmail.com','Vimal');
      });
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email() {
      $data = array('name'=>"Vimal");
      Mail::send('mail', $data, function($message) {
         $message->to('vimal.sasikumar@colanonline.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('vimaltech43@gmail.com','Vimal');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Vimal");
      Mail::send('mail', $data, function($message) {
         $message->to('vimal.sasikumar@colanonline.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('vimaltech43@gmail.com','Vimal');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}

?>