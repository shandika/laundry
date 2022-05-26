
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/laundry.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">

    <title>CLEAN YOURS - Laundry</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front-end/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/style.css') }}">

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ url('/') }}" class="logo">
              <img src="{{ asset('front-end/assets/images/logoclean.png') }}" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
              <li class="scroll-to-section"><a href="#newsletter">Newsletter</a></li>
              <li>
              @if (Route::has('login'))
                @auth
              <div class="action">
                    <div class="profile" onclick="menuToggle();">
                        <img src="{{ asset('/pictures/' . auth()->user()->avatar ) }}" alt="">
                    </div>
            
                    <div class="menu">
                        <h3>
                            {{ auth()->user()->name }}
                            <div>
                            {{ auth()->user()->role }}
                            </div>
                        </h3>
                        <ul>
                            <li>
                                <span class="material-icons icons-size">person</span>
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
                            @else
                            <li>
                                <span class="material-icons icons-size">inbox</span>
                                <a href="{{ url('/pesanan_saya') }}">Pesanan</a>
                            </li>
                            @endif
                            <li>
                                <span class="material-icons icons-size">logout</span>
                                <a href="{{ url('/logout') }}">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="gradient-button">
                  <div class="top-right links">
                          <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Sign In Now </a>
                          @if (Route::has('register'))
                          <a href="{{ route('registrasi') }}">Register</a>
                          @endif
                      @endauth
                      @endif
                  </div>
                </div>
              </li> 
            </ul>        
            <a class="menu-trigger">
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Dapatkan Harga Promo Mahasiswa Hanya Rp. 5.625</h2>
                    <p>CLEAN YOURS mempunyai standar pencucian yang berkualitas supaya pakaianmu tetap terjaga, tidak rusak, dan tidak hilang. Selain mencuci baju, kamu bisa mencuci sepatu dan tas juga loh.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                    @if (Route::has('login'))
                    <a href="{{ url('/pesanan_saya') }}">Cek Harga Lainnya</a>
                    @else
                    <a href="{{ url('/login') }}">Cek Harga Lainnya</a>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('front-end/assets/images/LaundryWash.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Pelayanan <em>Mencuci Terbaik</em> Untuk Kamu</h4>
            <img src="{{ asset('front-end/assets/images/heading-line-dec.png') }}" alt="">
            <p>Beberapa tahapan proses mencuci yang ada di CLEAN YOURS yang perlu kamu ketahui, karena kualitas cucian terbaik adalah tujuan utama kami.</p>
            <div class="border-button">
            @if (Route::has('login'))
                    <a href="{{ url('/pesanan_saya') }}">Cuci Sekarang</a>
                    @else
                    <a href="{{ url('/login') }}">Cuci Sekarang</a>
                    @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Entry Cucian</h4>
            <p>Kamu bisa booking cucian kamu secara online. Jangan khawatir, kita selalu stay dan fast respon.</p>
            <!-- <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Kualitas Pencucian</h4>
            <p>Pakaian kamu akan kita cuci hingga bersih, kita menjamin pakaianmu gak bakalan rusak, tertukar, ataupun hilang.</p>
            <!-- <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Harga</h4>
            <p>Masalah harga? tenang saja, kita menyediakan diskon bagi mahasiswa yang ingin mencuci di laundry kita.</p>
            <!-- <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Pengemasan</h4>
            <p>Baju akan kita kemas serapih mungkin. Double protect? gak masalah, kamu bisa request packing tambahan kok.</p>
            <!-- <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h4>Tentang <em>CLEAN YOURS</em></h4>
            <img src="{{ asset('front-end/assets/images/heading-line-dec.png') }}" alt="">
            <p>CLEAN YOURS adalah tempat laundry yang mempunyai kualitas pencucian terbaik, dengan mengutamakan pelayanan terhadap konsumen kita dapat memberikan: </p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Kualitas Terbaik</a></h4>
                <p>Cucian Bersih Terjaga</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Harga Terjangkau</a></h4>
                <p>Ada Promo Mahasiswa</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Lokasi Strategis</a></h4>
                <p>Akses Lokasi Mudah</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Tepat Waktu</a></h4>
                <p>Proses Dengan Apik</p>
              </div>
            </div>
            <div class="col-lg-12">
              <p>4 hal tersebut kita berikan agar setiap konsumen kita mendapatkan kepuasan lebih ketika mencuci di laundry CLEAN YOURS.</p>
              <!--<div class="gradient-button">
                <a href="#">Start 14-Day Free Trial</a>
              </div> -->
              <!-- <span>*No Credit Card Required</span> -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="{{ asset('front-end/assets/images/about-clean.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Kami menyediakan <em>Harga</em> Yang Terjangkau</h4>
            <img src="{{ asset('front-end/assets/images/heading-line-dec.png') }}" alt="">
            <p>Cek harga yang kita sediakan untuk setiap pakaian dalam jumlah satuan (bukan per-kilogram) yang akan kamu cuci</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <h4>Pakaian Wanita</h4>
            <div class="icon">
              <img src="{{ asset('front-end/assets/images/dress.png') }}" alt="">
            </div>
            <ul>
              <li>Blazer</li>
              <li>Long & Short Skirt</li>
              <li>Long & Short Dress</li>
              <li>Pajamas</li>
              <li>Panties</li>
              <li>etc.</li>
            </ul>
            <div class="border-button">
              <a href="https://drive.google.com/drive/folders/1nxuIK2NEh-8EPgW7V2q0FO-1yD1Q4t1J?usp=sharing" target="_blank">Lihat Harga</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-pro">
            <h4>Pakaian Pria</h4>
            <div class="icon">
              <img src="{{ asset('front-end/assets/images/shirt.png') }}" alt="">
            </div>
            <ul>
              <li>Work Shirt</li>
              <li>Tshirt</li>
              <li>Pants</li>
              <li>Socks</li>
              <li>Pajamas</li>
              <li>etc.</li>
            </ul>
            <div class="border-button">
              <a href="https://drive.google.com/drive/folders/1GoC4wW6pWTENlBRjLhIPd6rj4KWhDTDW?usp=sharing" target="_blank">Lihat Harga</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <h4>Sepatu, Tas, dan Lainnya</h4>
            <div class="icon">
              <img src="{{ asset('front-end/assets/images/sneakers-bag.png') }}" alt="">
            </div>
            <ul>
              <li>Shoes</li>
              <li>Backpack</li>
              <li>Jacket</li>
              <li>Bed Cover</li>
              <li>Bed Sheet</li>
              <li>etc.</li>
            </ul>
            <div class="border-button">
              <a href="https://drive.google.com/drive/folders/1KnIQBwwBLkyVRV0vczGHLowcV1NepUmq?usp=sharing" target="_blank">Lihat Harga</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Join our mailing list to receive the news &amp; latest trends</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
          <form id="masukan" action="{{ url('/kirim_masukan') }}" method="GET">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <textarea name="pesan" class="textmasukan" placeholder="Ketik disini" autocomplete="on" required></textarea>
                </fieldset>
              </div>
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <button type="submit" class="btn btn-default main-button">Kirim Masukan <i class="fa fa-angle-right"></i></button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Contact Us</h4>
            <p><a href="https://www.google.co.id/maps/place/CleanYours+Laundry/@-6.3681886,106.8162841,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69ec1d82b16963:0x915e28fa2ce723eb!8m2!3d-6.3681939!4d106.8184728">Jl. Palakali, Kukusan, Kec. Beji, Depok, Jawa Barat, 16425</a></p>
            <p><a href="tel:+628118794225">0811-879-4225</a></p>
            <p><a href="mailto:cleanyours2022@gmail.com">cleanyours2022@gmail.com</a></p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Us</h4>
            <ul>
              <li><a href="#top">Home</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#newsletter">Newsletter</a></li>
              <li><a href="#pricing">Pricing</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Contact Us</h4>
            <ul>
              <li><a href="https://api.whatsapp.com/send?phone=628118794225" target="_blank">Whatsapp</a></li>
              <li><a href="https://www.instagram.com/cleanyours_/?hl=id" target="_blank">Instagram</a></li>
              <li><a href="#">Telegram</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Our Company</h4>
            <div class="logo">
              <img src="{{ asset('front-end/assets/images/cleanyours.png') }}" alt="">
            </div>
            <p>CLEAN YOURS merupakan tempat laundry dengan kualitas pencucian terbaik yang berdiri sejak tahun 2015.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2022 Clean Yours. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="{{ asset('front-end/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front-end/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('front-end/assets/js/animation.js') }}"></script>
  <script src="{{ asset('front-end/assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('front-end/assets/js/popup.js') }}"></script>
  <script src="{{ asset('front-end/assets/js/custom.js') }}"></script>
  <script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>

  <script>
    function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }

    @if ($message = Session::get('terubah'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    )
    @endif
</script>
</body>
</html>
