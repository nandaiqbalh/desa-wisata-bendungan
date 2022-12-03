@extends('frontend.frontend_master')

@section('frontend')

<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('frontend/assets/img/slide/slide-1.jpg')}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>Desa Bendungan</span></h2>
              <p>Desa Bendungan adalah desa wisata yang terletak di Kecamatan Wates, Kabupaten Kulon Progo. Desa Bendungan memiliki banyak program dan event menarik!</p>
              {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('frontend/assets/img/slide/slide-2.jpg')}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Ikuti berbagai event!</h2>
              <p>Ikuti event Desa Bendungan dan rasakan keseruannya.</p>
              {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
            </div>
          </div>
        </div>

        <!-- Slide 3 -->

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Tentang Kami</strong></h2>
              </div>

              <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                  <h2>Desa Wisata Bendungan</h2>
                  <h3>Temukan keindahan dan ikuti berbagai event menarik dari Desa Bendungan.</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                  <p>
                    Eksplore tentang kami.
                  </p>
                  <ul>
                    <li><i class="ri-check-double-line"></i> Program Mulia.</li>
                    <li><i class="ri-check-double-line"></i> Event Menarik.</li>
                  </ul>
                  <p class="font-italic">
                    Yuk yuk yuk!
                  </p>
                </div>
              </div>

            </div>
          </section><!-- End About Us Section -->

@endsection
