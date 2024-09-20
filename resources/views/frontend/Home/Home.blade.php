{{-- php block --}}
@php
    $Home =App\Models\information::find(1);
@endphp
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="text-center col-lg-6">
          <h2>{{@$Home->short_title }}</h2>
          <p>{{ @$Home->long_title }}</p>
          <a href="{{ @$Home->url }}" class="btn-get-started">Available for hire</a>
        </div>
      </div>
    </div>
  </section>
