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
            'price'=>'required|numeric',
            'money'=>'required|numeric'
        ],[
            'price.required'=>'กรุณากรอกราคาสินค้า',
            'money.required'=>'กรุณากรอกจำนวนเงินที่ได้รับ',
            'price.numeric'=>'ราคาสินค้าต้องเป็นตัวเลข',
            'money.numeric'=>'จำนวนเงินที่ได้รับต้องเป็นตัวเลข']
        );

        $price = $request->input('price');
        $money = $request->input('money');
        
        $change = $money-$price;
        $array = array(500,100,50,10,5,1);
        $pay = array();
        for ($i = 0; $i < 6; $i++){
            $pay[$i] = (int) floor($change/$array[$i]);
            $change = $change%$array[$i];
        }
        return view('Index',['price'=> $price,'money' => $money , 'pay' => $pay, 'array' => $array]);
    }
}
