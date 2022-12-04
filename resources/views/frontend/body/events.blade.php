@extends('frontend.frontend_master')

@section('frontend')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Events</h2>
            <ol>
              <li><a href="{{url('/')}}">Home</a></li>
              <li>Events</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container">

          <div class="row">

            <div class="col-lg-12 entries">

                @foreach ($events as $item)

              <article class="entry" data-aos="fade-up">

                <div class="entry-img">
                  <img src="{{asset('frontend/assets/img/blog-1.jpg')}}}}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="{{ route('frontend.events.show', $item->id) }}">{{$item -> name}}</a>
                </h2>

                <div class="entry-content">
                  <p>
                   {{$item->short_desc}}
                  </p>
                  <div class="read-more">
                    <a href="{{ route('frontend.events.show', $item->id) }}">Read More</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
              @endforeach

            </div><!-- End blog entries list -->
          </div>

        </div>
      </section><!-- End Blog Section -->

@endsection
