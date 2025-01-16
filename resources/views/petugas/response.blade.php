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
<body class="pt-5">
    <section class="w-50 d-block m-auto" id="form">
        <h2 class="faq-title" data-aos="fade-up">Create/Update Response</h2>
        <div class="row">
            <form method="POST" action="{{route('petugas.response', $pawnshopId)}}" class="col-md-12 contact-form-wrapper">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group col-md-12" data-aos="fade-up">
                        <label for="type">Type</label>
                        @if ($data)
                            <select name="type" id="type" style="height: 60px !important" class="form-control @error('type') is-invalid @enderror">
                                <option value="Ditolak" {{$data['type'] == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                                <option value="Diterima" {{$data['type'] == 'Diterima' ? 'selected' : ''}}>Diterima</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        @else
                            <select name="type" id="type" style="height: 60px !important" class="form-control @error('type') is-invalid @enderror">
                                <option selected hidden disabled>Select Type</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Diterima">Diterima</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12" data-aos="fade-up">
                        <label for="shop_location">Shop Location</label>
                        <input type="text" name="shop_location" placeholder="Fill Shop Location" class="form-control @error('shop_location') is-invalid @enderror" value="{{$data ? $data['shop_location'] : ''}}">
                        @error('shop_location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Submit</button>
                    @if ($data)
                        <a href="{{route('petugas.data.status')}}" class="btn btn-secondary ml-3">Cancel</a>
                    @else
                        <a href="{{route('petugas.data')}}" class="btn btn-secondary ml-3">Cancel</a>
                    @endif
                </div>
            </form>
        </div>
    </section>
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