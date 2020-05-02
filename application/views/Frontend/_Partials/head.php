
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon"/>
  <!-- Load Css -->
  <link rel="stylesheet" href="<?php echo base_url('css/my-style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('css/sb-admin-2.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('css/aos.css') ?>">

  <!-- Load Fontawesome -->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i)" rel="stylesheet"> -->

  <script src="<?php echo base_url('assets/bootstrap/js/aos.js'); ?>" type="text/javascript"></script>
    <!-- Load JavaScript -->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js'); ?>"></script>
	
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin-2.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/custom.js'); ?>"></script>
  <script src="<?php echo base_url('js/jquery.formatCurrency-1.4.0.pack.js'); ?>"></script>
	
  <!-- Page level plugins -->
	<script src="<?php echo base_url('assets/sweetalert/sweetalert2.all.min.js'); ?>"></script>


	
  <script>
        $(document).ready(function(){
              $("a").on('click', function(event) {
                if (this.hash !== "") {
                  event.preventDefault();
                  var hash = this.hash;
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 800, function(){
                    window.location.hash = hash;
                  });
                } 
              });
        });

            $(window).scroll(function(){
                $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
						});
						
						
  </script>
  <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ."-". ucfirst($this->uri->segment(2)) ?></title>
