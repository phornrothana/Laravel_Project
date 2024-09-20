@extends('frontend.main_master')
@section('main')

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="text-center col-lg-6">
            {{-- <h2>Nature (16 images)</h2> --}}
            <h4>{{@$category->category}}</h4>
            <p>{{ @$category->text }}</p>

            <a class="cta-btn" href="#">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="row gy-4 justify-content-center">
            @foreach ($categoryDetail as  $item)
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="{{ asset(@$item->image) }}" class="img-fluid" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="{{ asset(@$item->image) }}" title="" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                <a href="#" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section>

  </main>

@endsection
