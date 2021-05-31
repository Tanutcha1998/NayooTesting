<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function start(){
        return view('Index');
    }
    public function calculate(Request $request){
        $this->validate($request,[
            'money'=>'required|numeric'
        ],[
            'money.required'=>'กรุณากรอกจำนวนเงิน',
            'money.numeric'=>'จำนวนเงินต้องเป็นตัวเลขเท่านั้น']
        );

        $money = $request->input('money');
        
        //ร้านที่ 1
        $balance1 = $money;
        $amount1 = 0;
        if($balance1/25 >= 10){
            do {
                $amount1 = $amount1 + floor($balance1/25);
                $price = $amount1*25;
                $balance1 = $money-($price-($price*0.2));
            } while ($balance1 >= 25);
        } else {
            $amount1 = floor($balance1/25);
            $balance1 = $money-$amount1*25;
        }

        //ร้านที่ 2
        $N = floor($money/30);
        $balance2 = 0;
        if($N/3>=1){
            $amount2 = $N + floor($N/3);
            $balance2 = $money-$N*30;
        } else {
            $amount2 = $N;
            $balance2 = $money-$N*30;
        }

        //ร้านที่คุ้มที่สุด
        if($amount1>$amount2){
            $value = 'แนะนำให้ซื้อร้านค้าที่ 1 จะคุ้มที่สุด';
        } elseif($amount1<$amount2){
            $value = 'แนะนำให้ซื้อร้านค้าที่ 2 จะคุ้มที่สุด';
        } else {
            if($balance1>$balance2){
                $value = 'แนะนำให้ซื้อร้านค้าที่ 1 จะคุ้มที่สุด';
            } elseif($balance1<$balance2){
                $value = 'แนะนำให้ซื้อร้านค้าที่ 2 จะคุ้มที่สุด';
            } else {
                $value = 'ซื้อร้านไหนก็ได้';
            }
        }

        return view('Index',compact('money','amount1','balance1','amount2','balance2','value'));
    }
}
