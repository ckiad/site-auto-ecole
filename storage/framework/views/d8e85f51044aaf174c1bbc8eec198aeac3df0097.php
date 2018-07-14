<html>
<head>
  <meta charset="utf-8">
  <title>
    Live Cars Training | <?php echo $__env->yieldContent('titre'); ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="<?php echo e(asset('assets/css/template/bootstrap.css')); ?>"rel="stylesheet">

  <!-- Edit CSS -->
  <link href="<?php echo e(asset('assets/css/template/default.css')); ?>"rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/template/auto-ecole.css')); ?>"rel="stylesheet">

  <!-- Font Awesome -->
  <link href="<?php echo e(asset('assets/css/template/font-awesome.css')); ?>" rel="stylesheet">
  <!-- link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" -->
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,900,700,600,300,200" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
  <script src="<?php echo e(asset('')); ?>" js/html5shiv.js"></script>
  <script src="<?php echo e(asset('')); ?>" js/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <div id="page" class="page">

    <!-- Begin header -->
    <header class="header8" id="home">

      <!-- Begin navbar section -->
      <?php echo $__env->yieldContent('navbar'); ?>
      <!-- End navbar section -->

      <!-- Begin introduction section -->
      <?php echo $__env->yieldContent('intro'); ?>
      <!-- End introduction section -->
    </header>
    <!-- End header -->

    <!-- Begin variable content -->
    <?php echo $__env->yieldContent('contenu'); ?>
    <!-- End variable content -->

    <!-- Debut footer -->
    <footer class="footer8">
      <div class="container">
        <div class="col-md-12">
          <p class="pull-left small"><a href="http://www.auto-ecole-lavie.com"> Auto-école la vie, </a>
            <script>
            document.write(new Date().getFullYear())
            </script>
          </p>
        </div>
      </div>
    </footer>
    <!-- Fin footer -->
  </div>


  <!-- Chargement de fihciers JavaScript -->
  <script src="<?php echo e(asset('assets/js/template/jquery-1.8.3.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/isotope.pkgd.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/jquery.countdown.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/jquery.flexslider.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/jquery.nivo.slider.pack.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/portfolio-custom1.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/portfolio-custom2.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/scrollreveal.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/template/auto-ecole.js')); ?>"></script>
</body>

</html>
