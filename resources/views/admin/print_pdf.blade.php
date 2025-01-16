<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegadaian Terverifikasi</title>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Data Pegadaian Terverifikasi</h2>

    <table id="customers">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Telp</th>
            <th>NIK</th>
            <th>Item</th>
            <th>Image</th>
            <th>Status</th>
            <th>Shop Location</th>
            <th>Updated</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
            @if ($item['response'])
            <tr class="table-info">
                <th scope="row">{{$no++}}</th>
                <td>{{$item['name']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['age']}}</td>
                <td>{{$item['phone_number']}}</td>
                <td>{{$item['nik']}}</td>
                <td>{{$item['item']}}</td>
                <td><img src="assets/img-upload/{{$item['item_photo']}}" width="80"></td>
                <td>{{$item['response']['type']}}</td>
                <td>{{$item['response']['shop_location']}}</td>
                <td>{{\Carbon\Carbon::parse($item['response']['updated_at'])->format('j F, Y')}}</td>
            </tr>
            @endif
        @endforeach
    </table>
</body>
</html>