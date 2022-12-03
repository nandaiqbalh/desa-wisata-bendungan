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


            <div class="col-lg-12">
                <div class="icon-box iconbox-pink">

                    <img src="{{Storage::url($item->thumbnail)}}" alt="Image" style="height: 120px; width: 150px">

                    <h4><a href="{{ route('frontend.programs.show', $item->id) }}">{{$item -> name}}</a></h4>
                  <span>{{$item -> short_desc}}</span>
                  <p>{{$item -> long_desc}}</p>

                </div>
              </div>

          </div>

        </div>
      </section><!-- End Services Section -->

@endsection
