<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
        }
        .header{
            width: 100%;
            height: 280px;
           
        }
        .logo{
            width: 100%;
            height: 30px;
            display: flex;
            align-items: center;
        }
        .logo_img{
            width: ;
            height: 25px;
            display: flex;
            align-content: center
        }
        .title{
            width: 100%;
            height: 40px;
            font-size: 1.5em;
            margin-block-start: 0.83em;
           
            font-weight: bold
        }
        .info{
           height: 156px;
           width: 100%;
           display: flex;
           
        }
        .header-left,.header-right{
            width: 40%;
            height: 100%;
            display: grid;
            
        }
        .header-right{
            text-align: right
        }
        .space{
            width: 100%;
            height: 20px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            height: 50px;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
        }
        table{
            width: 100%;
            
        }

        table {
            counter-reset: tableCount;     
        }
        .counterCell:before {              
            content: counter(tableCount); 
            counter-increment: tableCount; 
        }
        hr{
            border: 0.1px solid black;
        }
    </style>
    <style>
        *{ font-family: DejaVu Sans !important;}
      </style> 
</head>
<body>
   
    <div class="header">
        <div class="logo">
            <img class="logo_img" src="{{ asset('img/customer') }}/logo_pdf.png" alt="">
        </div>
        <hr>
        <div class="title">
            <span>A: Thông tin cá nhân</span>
        </div>
        
        <div class="info"> 
            <div class="header-left">
                <h3>Họ và tên: {{ $prescriptionModel->user->name }} </h3>
                <span>Ngày sinh: {{ $prescriptionModel->user->birthdate() }} </span>
                <br>
                <span>Giới tính : {{ $prescriptionModel->user->gender }} </span>
                <br>
                <span>Số điện thoại : {{ $prescriptionModel->user->login->phone_number }} </span>

            
                <h3>Bác sĩ: {{ $prescriptionModel->user->name }}</h3>
                <span>Ngày khám bệnh: {{ $prescriptionModel->user->name }}</span>
                
            </div>
        </div>
        
    </div>
    <div class="space"></div>
    <hr>
    <h2>B: Toa thuốc</h2>
    <table>
        <thead>
            <tr>
                <th>
                    Mã thuốc
                </th>
                <th>
                    Tên thuốc
                </th>
                <th colspan="2">
                    Thời gian uống/Liều lượng
                </th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($prescriptiondetails as $key => $prescriptiondetail)
                <tr>
                    <td  class="counterCell"></td>
                    <td>{{ $key }}</td>
                    @foreach ($prescriptiondetail as $prescriptiondetail)
                        <td>
                            {{ $prescriptiondetail->shift_name() }}/
                            {{ $prescriptiondetail->amount_of_time }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="body"></div>
</body>
</html>