<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cekPolindromController extends Controller
{


    public function send(Request $request)
    {
         // validasi input
         $validate = Validator::make($request->all(), 
         [
             'wordText' => 'required|regex:/^[a-zA-Z\s]+$/',
         ],
         [
             'required' => 'Silahkan input kata yang ingin di cari dahulu !',
             'regex' => 'Input hanya boleh karakter a-z !',
         ]);
     
         if ($validate->fails()) {
             $errorArr = json_decode($validate->errors());//$validator->messages();
             $errorStr ='';
 
             foreach ($errorArr as $item) {
                 $errorStr .= '<div>'.$item[0].'</div>';
             }
 
             return \redirect()->back()->with('error_message',$errorStr);
         }


         $palindrome = \strtolower($request->wordText);
         $split = str_split($palindrome);
         $jml   = strlen($palindrome);
         $banyakKata = str_word_count($palindrome);
         $reverseText = "";
         for ($i=($jml-1); $i >= 0; $i--) { 
          $reverseText .= $split[$i];
         }
     
         if ($palindrome==strtolower($reverseText)) {
            $is_palindrome = true;
         }else{
            $is_palindrome = false;
         }

         $data = [
            'banyak_kata' => $banyakKata,
            'palindrome' => $palindrome,
            'kata_pertama' => \strtok($palindrome, " "),
            'is_palindrome' => $is_palindrome,
         ];

         return view('result',\compact('data'));
    }


}
