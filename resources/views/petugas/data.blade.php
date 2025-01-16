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
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <nav aria-label="breadcrumb w-100">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('petugas.data')}}">Send Responses</a></li>
              <li class="breadcrumb-item"><a href="{{route('petugas.data.status')}}">By Type</a></li>
              <li class="breadcrumb-item"><a href="{{route('logout')}}">Logout</a></li>
            </ol>
          </nav>
        </div>
        <form class="input-group w-50 m-auto" method="GET" action="">
          @csrf
          <input type="search" class="form-control rounded" placeholder="Search by name" aria-label="Search" aria-describedby="search-addon" name="search" />
          <button type="submit" class="btn btn-outline-success mb-4 pb-2">search</button>
          <div>
            <a href="{{route('petugas.data')}}" class="btn btn-outline-secondary">Refresh</a>
          </div>
        </form>
    </nav>

    <div class="px-5 my-3">
        <!--Table-->
<table class="table table-hover table-fixed">

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
        <th></th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      @php
          $no = 1;
      @endphp
      @foreach ($data as $item)
      @if (!$item->response)
      <tr>
        <th scope="row">{{$no++}}</th>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['age']}}</td>
        <td>{{$item['phone_number']}}</td>
        <td>{{$item['nik']}}</td>
        <td>{{$item['item']}}</td>
        <td>
          <a href="../assets/img-upload/{{$item['item_photo']}}" target="_blank">
            <img src="assets/img-upload/{{$item['item_photo']}}" width="80">
          </a>
        </td>
        <td>
            <a href="{{route('petugas.response.edit', $item['id'])}}" class="btn btn-success">Send Response</a>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
    <!--Table body-->

  </table>
  <!--Table-->
    </div>
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
