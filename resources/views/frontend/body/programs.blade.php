@extends('frontend.frontend_master')

@section('frontend')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Programs</h2>
            <ol>
              <li><a href="{{url('/')}}">Home</a></li>
              <li>Programs</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="row">

              @foreach ($programs as $item)

              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon-box iconbox-pink">

                    <img src="{{Storage::url($item->thumbnail)}}" alt="Image" style="height: 120px; width: 150px">

                    <h4><a href="{{ route('frontend.programs.show', $item->id) }}">{{$item -> name}}</a></h4>
                  <p>{{$item -> short_desc}}</p>
                </div>
              </div>

              @endforeach
          </div>

        </div>
      </section><!-- End Services Section -->

@endsection
