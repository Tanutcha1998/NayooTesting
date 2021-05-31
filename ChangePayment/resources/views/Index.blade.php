<!DOCTYPE html>
<html>
<head>
	<title>คำนวณเงินทอน</title>
</head>
<body>
    <div class="container">
        <center>
        <h1> โปรแกรมคำนวณเงินทอน </h1>
        <form  action="{{route('input')}}" method="POST">
        @csrf
            ราคาสินค้า : 
            <input type="text" name="price" />
            จำนวนเงินที่ได้รับ : 
            <input type="text" name="money" />
            <input type="submit" value="คำนวณ" /><br>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <span style="color:red">{{ $error }}</span><br>
                @endforeach
            @endif
        </form>
        <br>
        @if(@isset($price))
            @if($money-$price >= 0)
                <table align="center" style ="padding: 15px">
                    <tr>
                        <th colspan="3"><h3>ผลลัพธ์ </h3></th>
                    </tr>
                    <tr>
                        <th align="left" style ="padding: 5px"> ราคาสินค้า = {{$price}} บาท </th>
                        <th align="left" style ="padding: 5px"> จำนวนเงินที่ได้รับ = {{$money}} บาท </th>
                        <th align="left" style ="padding: 5px"> เงินทอน = {{$money-$price}} บาท </th>
                    </tr>
                    @for ($i = 0; $i < 6; $i++)
                        @if($pay[$i]>0)
                            @if($i<=2)
                                <tr>
                                    <td align="left" style ="padding: 5px" colspan="2"> ธนบัตร {{$array[$i]}} = {{$pay[$i]}} ใบ </td>
                                </tr>
                            @else
                                <tr>
                                    <td align="left" style ="padding: 5px" colspan="2"> เหรียญ {{$array[$i]}} = {{$pay[$i]}} เหรียญ </td>
                                </tr>
                            @endif
                        @endif
                    @endfor
                </table>
            @else
            <span style="color:red;">กรุณาตรวจสอบข้อมูล</span><br>
            @endif
        @endif
    </div>	
</body>
</html>