@extends('frontend.main_master')
@section('main')

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="text-center col-lg-6">
            <h2>Contact</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="flex-shrink-0 bi bi-geo-alt"></i>
              <div>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="flex-shrink-0 bi bi-envelope"></i>
              <div>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="flex-shrink-0 bi bi-phone"></i>
              <div>
                <h4>Call:</h4>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="mt-4 row justify-content-center">

            <div class="col-lg-9">
                <form id="contactForm" action="{{ route('frontend.contact.store') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="mt-3 col-md-6 form-group mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="mt-3 form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading" style="display: none;">Loading...</div>
                        <div class="error-message" style="display: none;"></div>
                        <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
  <!-- End #main -->

  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    let isSubmitting = false; // Flag to track submission

    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        if (isSubmitting) return; // Prevent further submissions if already submitting

        isSubmitting = true; // Set the flag
        $('.loading').show();
        $('.error-message').hide();
        $('.sent-message').hide();

        // Disable the submit button
        $(this).find('button[type="submit"]').attr('disabled', true);

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                $('.loading').hide();
                if (response.success) {
                    $('.sent-message').show().text(response.message);
                } else {
                    $('.error-message').show().text(response.message);
                }
            },
            error: function(xhr) {
                $('.loading').hide();
                $('.error-message').show().text('An unexpected error occurred. Please try again.');
            },
            complete: function() {
                // Re-enable the submit button
                $(this).find('button[type="submit"]').attr('disabled', false);
                isSubmitting = false; // Reset the flag
            }
        });
    });
});
  </script> --}}
@endsection
