<!DOCTYPE html>
<html>
<head>
	<title>คำนวณความคุ้มค่า</title>
</head>
<body>
    <div class="container">
        <center>
        <h1> โปรแกรมคำนวณการซื้อของที่ร้านค้า </h1>
        <form  action="{{route('input')}}" method="POST">
        @csrf
            จำนวนเงิน : 
            <input type="text" name="money" />
            <input type="submit" value="คำนวณ" /><br>
            @error('money')
                <span style="color:red">{{ $message }}</span><br>
            @enderror
        </form>
        <br>
        <table>
            <tr>
                <th>เงื่อนไข : </th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td><b>ร้านค้าที่ 1 </b>ราคาสินค้าชิ้นละ 25 บาท เมื่อซื้อ 10 ชิ้นขึ้นไป ลดให้ 20%</td>
            </tr>
            <tr>
                <td></td>
                <td><b>ร้านค้าที่ 2 </b>ราคาสินค้าชิ้นละ 30 บาท เมื่อซื้อสินค้า 3 ชิ้น แถมให้ 1 ชิ้น</td>
            </tr>
        </table>
        @if(@isset($money))
        <table align="center" style ="padding: 15px">
            <tr>
                <th colspan="2" style ="padding: 5px">มีเงินจำนวน {{$money}} บาท</th>
            </tr>
            <tr>
                <td style ="padding: 5px"><b>ร้านค้าที่ 1 : </b></td>
                <td style ="padding: 5px">ได้สินค้า {{$amount1}} ชิ้น เหลือเงิน {{$balance1}} บาท</td>
            </tr>
            <tr>
                <td style ="padding: 5px"><b>ร้านค้าที่ 2 :</b></td>
                <td style ="padding: 5px">ได้สินค้า {{$amount2}} ชิ้น เหลือเงิน {{$balance2}} บาท</td>
            </tr>
            <tr>
                <th colspan="2" style ="padding: 5px">{{$value}}</th>
            </tr> 
        </table>
        @endif
    </div>	
</body>
</html>