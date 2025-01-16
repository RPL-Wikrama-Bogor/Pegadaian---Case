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
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand text-success font-weight-bold" href="index.html">PawnShop</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#form">Contact</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin')
                                <a class="nav-link" href="{{route('admin.data')}}">Data</a>
                                @elseif (Auth::user()->role == 'petugas')
                                <a class="nav-link" href="{{route('petugas.data')}}">Data</a>
                                @endif
                            @else
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                            @endif
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Logout</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <section class="edica-about-intro py-5">
                        <div class="row">
                            <div class="col-12">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ol>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-right" data-aos-delay="150">
                                <h2 class="intro-title pb-3 pb-md-0 mb-4 mb-md-0">Quick & Easy Process <span>with best pawnshop</span></h2>
                            </div>
                            <div class="col-md-6 intro-content" data-aos="fade-left" data-aos-delay="150">
                                <p><span class="first-letter">L</span>orem ipsum, or lipsum as it is   sometimes known, is dummy text used in laying out printed graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th century.</p>
                            </div>
                        </div>
                    </section>
                    <section class="edica-about-vision py-5" id="about">
                        <div class="row">
                            <div class="col-md-6 pb-3 pb-md-0 mb-4 mb-md-0" data-aos="fade-right" data-aos-delay="200">
                                <img src="assets/images/pegadaian.jpeg" alt="vision" class="img-fluid">
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                <h2 class="vision-title" data-aos="fade-left">Our Vision</h2>
                                <p class="vision-text" data-aos="fade-left">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                            </div>
                        </div>
                    </section>
                    <section class="edica-about-counter py-5 d-md-flex justify-content-between" id="counter" data-aos="fade-up">
                        <div class="counter-card mb-3 pb-1 pb-md-0 mb-md-0">
                            <h3 class="counter-count"><span class="count" data-count="500">0</span>+</h3>
                            <p class="count-label">Visitors</p>
                        </div>
                        <div class="counter-card mb-3 pb-1 pb-md-0 mb-md-0">
                            <h3 class="counter-count">95%</h3>
                            <p class="count-label">Liked</p>
                        </div>
                        <div class="counter-card mb-3 pb-1 pb-md-0 mb-md-0">
                            <h3 class="counter-count"><span class="count" data-count="440">0</span>+</h3>
                            <p class="count-label">Propose</p>
                        </div>
                        <div class="counter-card mb-3 pb-1 pb-md-0 mb-md-0">
                            <h3 class="counter-count"><span class="count" data-count="350">0</span>+</h3>
                            <p class="count-label">Reviews</p>
                        </div>
                    </section>
                    <section class="edica-about-faq py-5 mb-5" id="form">
                        <h2 class="faq-title" data-aos="fade-up">Start Pawning Your Stuff</h2>
                        <p class="faq-section-text" data-aos="fade-up" data-aos-delay="100">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed graphic or web designs. </p>
                        <div class="row">
                            <form method="POST" action="{{route('pawnshop.store')}}" class="col-md-12 contact-form-wrapper">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="fade-up">
                                        <label for="name">NAME</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your full name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email address">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" data-aos="fade-up" data-aos-delay="100">
                                        <label for="age">AGE</label>
                                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Your age">
                                        @error('age')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="fade-up">
                                        <label for="phone">PHONE</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone" name="phone_number" placeholder="Phone">
                                        @error('phone_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <label for="subject">NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="subject" name="nik" placeholder="NIK">
                                        @error('nik')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
                                        <label for="item">ITEM</label>
                                        <select name="item" id="item" class="form-control @error('item') is-invalid @enderror" style="height: 60px !important;">
                                            <option selected hidden disabled>Select Type Item</option>
                                            <option value="Barang">Barang</option>
                                            <option value="Sert">Sertifikat</option>
                                            <option value="Kendaraan">Kendaraan</option>
                                        </select>
                                        @error('item')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
                                        <label for="item_photo">ITEM PHOTO</label>
                                        <input type="file" name="item_photo" id="item_photo" class="form-control @error('item_photo') is-invalid @enderror">
                                        @error('item_photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Send Data</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <footer class="edica-footer" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-6">
                    <a href="index.html" class="footer-brand-wrapper">
                       <h2 class="text-success font-weight-bold">PawnShop</h2>
                    </a>
                    <p class="contact-details">pawnshop@gmail.com</p>
                    <p class="contact-details">+23 3000 000 00</p>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">FAQ</a>
                        <a href="#!" class="nav-link">Reporting</a>
                        <a href="#!" class="nav-link">Block Storage</a>
                        <a href="#!" class="nav-link">Tools & Integrations</a>
                        <a href="#!" class="nav-link">API</a>
                        <a href="#!" class="nav-link">Pricing</a>
                    </nav>
                </div>
            <div class="footer-bottom-content">
                <nav class="nav footer-bottom-nav">
                    <a href="#!">Privacy & Policy</a>
                    <a href="#!">Terms</a>
                    <a href="#!">Site Map</a>
                </nav>
            </div>
        </div>
    </footer>
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
