@php
    $Footer = App\Models\Footer::find(1);

@endphp
<footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; copyright <strong><span> {{ @$Footer->copyright_by }}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
        Designed by <a href="#">{{ @$Footer->design_by }}</a>
      </div>
    </div>
  </footer>
