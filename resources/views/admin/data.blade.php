<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pawnshop</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body class="py-5">
    <h2 class="text-center mb-3">All Data</h2>
    <div class="d-flex justify-content-center mb-3">
        <a href="{{route('admin.print-pdf')}}" class="btn btn-primary mr-2">Cetak PDF</a>
        <a href="{{route('admin.print-excel')}}" class="btn btn-success">Cetak Excel</a>
        <a href="{{route('logout')}}" class="btn btn-warning ml-2">Logout</a>
    </div>
    <form method="GET" action="{{route('admin.data')}}" class="input-group w-50 m-auto">
        @csrf
        <input type="search" class="form-control rounded" placeholder="Search by name..." aria-label="Search" name="name" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary mb-4 pb-2">search</button>
        <div>
            <a href="{{route('admin.data')}}" class="btn btn-outline-secondary">Refresh</a>
        </div>
    </form>
    <!--Table-->
    <table class="table table-striped w-auto m-auto">

        <!--Table head-->
        <thead>
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
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
            @if ($item->response)
            <tr class="table-info">
                <th scope="row">{{$no++}}</th>
                <td>{{$item['name']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['age']}}</td>
                @php
                    if ($item->response['type'] == 'Diterima') {
                        $message = 'Pengajuan gadai anda diterima, silahkan mengunjuki gerai kami di ' . $item->response['shop_location'];
                    }else {
                        $message = 'Pengajuan gadai anda ditolak, terdapat beberapa hal yang tidak sesuai dengan persyaratan.';
                    }
                @endphp
                <td><a href="https://wa.me" target="_blank">{{$item['phone_number']}}</a></td>
                <td>{{$item['nik']}}</td>
                <td>{{$item['item']}}</td>
                <td><img src="assets/img-upload/{{$item['item_photo']}}" width="80"></td>
                <td>{{$item->response['type']}}</td>
                <td>{{$item->response['shop_location']}}</td>
                <td>{{ $item->response['updated_at'] }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
        <!--Table body-->


    </table>
  <!--Table-->
    <script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{asset('assets/js/counter.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        AOS.init({
            duration: 2000
        });
    </script>
</body>
</html>
