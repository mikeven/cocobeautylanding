<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Chanel</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/icomoon-fonts.css">
  <link rel="stylesheet" type="text/css" href="css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="css/settings.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
  <link rel="stylesheet" type="text/css" href="css/zerogrid.css">
  <link rel="stylesheet" type="text/css" href="css/jPushMenu.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400%7COpen+Sans:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/onepage.css">

  <link rel="stylesheet" type="text/css" href="css/loader-colorful.css">

  <link rel="shortcut icon" href="favicon.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <link rel="stylesheet" href="css/universal-parallax.min.css">
  <link rel="stylesheet" href="css/glide.core.css">
  <link rel="stylesheet" href="css/glide.theme.css">
  <style type="text/css">

    .bgnd_layer{
      background-color: rgba(0, 0, 0, 0.0);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
    .bgnd_layer_darker{
      background-color: rgba(0, 0, 0, 0.75);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    /* Fondo negro para título de banner principal */
    @media screen and (max-width: 1140px){
      #bgndlayer_tit{
        background: rgba(0, 0, 0, .65);
        border-radius: 3px;
        padding: 20px 8px;
      }
    }
    @media screen and (min-width: 1141px){
      #content_main_banner{
        position:relative; 
        margin: 0 10%;
      }
    }

    @media screen and (min-width: 768px){
      .bgmain{
        background-position-y: 0% !important;
      }
      .mbanner-titles{ /*max-width: 880px;*/ padding-bottom: 35%; }
    }

    @media screen and (max-width: 767px){
      .bgmain{
        background-position-x: 75% !important;
        background-position-y: 0px !important;
      }
    }
    
    .tx_desc{
      padding: 2% 0;
    }
    .tx_desc p{
      font-size: 15px;
    }
    .titn_act{ padding: 15px 0; }

    .container--full {
      width: 100%;
      height: 100vh;
    }

    .container--small {
      min-height: 460px;
    }

    .bgmain{
      background: url( images/beauty-panel.jpg );
      
      background-position-x: center;
    }

    #info-club p, .item-content p{
      color: #fff !important;
    }

    .container_0, .container_1 {
      -webkit-align-items: center;
      align-items: center;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      -webkit-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin: 0;
      padding: 30px 15px;
      position: relative;
      width: 100%;
    }

    .container_0 .content {
      border-radius: 8px;
      color: #fff;
      margin: 0 auto;
      padding: 30px 35px;
      text-align: center;
    }

    .container_1 .content{
      background: rgba(0, 0, 0, .75);
      border-radius: 3px;
      color: #fff;
      margin: 0 auto;
      padding: 30px 35px;
      text-align: center;
    }

    .container_x .content {
      display: table-cell;
      vertical-align: middle;
      margin: 0 auto;
      padding: 30px 35px;
      text-align: center;
    }
    
    .btn-actividad{
      margin-top:15px; 
    }

  </style>
    
</head>
<?php
  include( "database/bd.php" );
  include( "database/data-actividad.php" );

  $actividades = obtenerActividades( $dbh );
?>

<body id="page-top" data-spy="scroll" data-target="#fixed-collapse-navbar" data-offset="120">

<div class="loader">
  <div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  </div>
</div>


<!-- Main-Navigation -->
<header id="main-navigation">
  <div id="navigation" data-spy="affix" data-offset-top="20">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-default">
          <div class="navbar-header page-scroll">
            <div align="center">
               <a class="navbar-brand logo" href="#."><img src="images/letras.png" alt="logo" class="img-responsive"></a> 
            </div>
         </nav>
       </div>
       </div>
     </div>
  </div>
</header>  

<!-- Agenda tu cita -->
<section class="container_0 container--full">
  <div id="content_main_banner" class="content">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item-content text-center mbanner-titles">
          <div id="bgndlayer_tit">
            <h4> Le ayudamos a encontrar la inspiración</h4>
            <p></p>
            <h5>Descubra los looks de maquillaje de estas fiestas de fin de año y encuentre el regalo perfecto para una navidad CHANEL.</h5>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12"></div>
    </div>
  </div>
  <div class="parallax bgmain"><div class="bgnd_layer"></div></div>
</section>

<!-- Información de evento -->
<section id="responsive" class="padding hidden">
  <div class="container-fluid">
    <div class="row responsive-pic">
      <div class="col-md-12 col-sm-12 wow fadeInDown hidden" data-wow-duration="500ms" data-wow-delay="600ms"> 
        
      </div>
      <div class="container wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms">
        <div class="row">
          <div class="col-md-12 col-sm-12 r-test">
            <div align="center">
              <img src="images/2713-slider.gif" alt="fully responsive" 
              class="img-responsive" id="cococlubmap"> 
              <h3 class="magin30">Del 25 de noviembre al 27 de diciembre</h3>
            </div>   
            <p style="text-align: center;">Nueva Costanera 3900, Vitacura, Región Metropolitana, Chile.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Información de contacto -->
<section class="container_1 container--small">
  <div class="content">
    
    <div id="info-club" class="text-center">
      <div align="center"> 
        <h3 class="magin30 rosa-chanel">Del 25 de noviembre al 27 de diciembre</h3>
      </div>   
      <p style="text-align: center;">Casa Costanera</p>
      
      <p>Nueva Costanera 3900, Vitacura, Región Metropolitana, Chile.</p>
      <a class="btn-white btn-common bounce-top page-scroll" href="#reserva">RESERVA</a>
    </div>
  </div>
  <div class="parallax" data-parallax-image="images/beauty-panel-xmas.jpg"></div>
</section>

<!-- Actividades -->
<section id="reserva" class="padding">
  <div class="glide">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides">
        <?php foreach ( $actividades as $a ) { ?>
        <li class="glide__slide">
          <div class="actividad">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-5" align="center">
                <img src="images/<?php echo $a["imagen"] ?>" class="img-responsive img_act">
              </div>
              <div class="col-md-5 text-center bloq_desc">
                <div class="tx_desc">
                  <h3 class="titn_act"><?php echo $a["nombre"] ?></h3>
                  <p><?php echo $a["descripcion"] ?><br>
                    <a href="actividad.php?id=<?php echo $a['id']?>" class="btn-white btn-common bounce-top btn-actividad">RESERVA</a>
                  </p>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
        <i class="fa fa-2x fa-arrow-left"></i>
      </button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
        <i class="fa fa-2x fa-arrow-right"></i>
      </button>
    </div>
  </div>
</section>

<!-- Footer-->
<footer class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"> 
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <ul class="breadcrumb hidden">
          <li><a href="#." class="page-scroll">Coco Beauty Club</a></li>
        </ul>
        <p>2019 Chanel</p>
      </div>
    </div>
  </div>
</footer>

 <a href="#." class="go-top text-center"><i class="fa fa-angle-double-up"></i></a>

<script src="js/jquery-2.1.4.js"></script> 
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.themepunch.revolution.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery-countTo.js"></script> 
<script src="js/jquery.appear.js"></script> 
<script src="js/jquery.circliful.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/wow.min.js"></script>
<!-- <script src="js/jquery.parallax-1.1.3.js"></script> -->
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.fancybox-thumbs.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/jPushMenu.js"></script>
<script src="js/functions.js"></script>
<script src="js/universal-parallax.min.js"></script>
<script src="js/glide.min.js"></script>

<script>
  new Glide('.glide').mount()
</script>
<script>
  new universalParallax().init({
    speed: 4
  });
</script>


</body>
</html>
