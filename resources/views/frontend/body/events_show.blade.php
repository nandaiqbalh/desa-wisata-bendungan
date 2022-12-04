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

            <div class="col-lg-8 entries">

              <article class="entry entry-single" data-aos="fade-up">

                <div class="entry-img">
                    <img src="{{Storage::url($item->thumbnail)}}" alt="Image"  class="img-fluid">

                </div>

                <h2 class="entry-title">
                    <a href="{{ route('frontend.events.show', $item->id) }}">{{$item -> name}}</a>
                </h2>

                <div class="entry-content">
                    <p>
                        {{$item->short_desc}}
                    </p>

                    <h5>Deskripsi</h3>
                    <p>
                        {{$item->long_desc}}
                    </p>
                </div>

              </article><!-- End blog entry -->

              <div class="blog-comments" data-aos="fade-up">

                <div class="reply-form">
                  <h4>Daftar</h4>
                  <p>Ikuti event tersebut dan rasakan keseruannya * </p>
                  <form action="">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name*">
                      </div>
                      <div class="col-md-6 form-group">
                        <input name="email" type="text" class="form-control" placeholder="Your Email*">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <input name="website" type="text" class="form-control" placeholder="Your Website">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>

                  </form>

                </div>

              </div><!-- End blog comments -->

            </div><!-- End blog entries list -->

            <div class="col-lg-4">

              <div class="sidebar" data-aos="fade-left">

                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="">
                    <input type="text">
                    <button type="submit"><i class="icofont-search"></i></button>
                  </form>

                </div><!-- End sidebar search formn-->

              </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

          </div>

        </div>
      </section><!-- End Blog Section -->


@endsection
