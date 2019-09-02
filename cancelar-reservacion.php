<?php
    /*
     * CBC - Cancelación de reservación
     * 
     */
    
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-reservacion.php" );
    
    if( isset( $_GET["token"] ) ){
      $token = $_GET["token"];
      $reservacion = obtenerReservacionPorToken( $dbh, $token );
      
    } else $reservacion = NULL;
    
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Chanel | Coco Beauty Club</title>
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
    background-color: rgba(0, 0, 0, 0.5);
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
    background: url( images/chanel_red.jpg );
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
    background: rgba(0, 0, 0, .5);
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

<body id="page-top" data-spy="scroll" data-target="#fixed-collapse-navbar" data-offset="120">

<div class="loader">
  <div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  </div>
</div>


<!-- Main-Navigation -->
<!--<header id="main-navigation">
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
</header> --> 

<!-- Actividad -->
<section id="reserva" class="padding">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
      <?php if( $reservacion["estado"] == "pendiente" ) { ?>
      <div class="form-group form-check">
        <p>Confirma que desea cancelar la reservación para</p>
        <div><h3 class="rosa-chanel"><?php echo $reservacion["actividad"] ?></h2></div>
        <div><?php echo $reservacion["fecha"] ?></div>

        <div style="padding: 80px 0 20px 0">
          <a href="#!" class="btn-white btn-common bounce-top btn-cancelar-rsv" 
          data-email="<?php echo $reservacion['email'] ?>" 
          data-token=<?php echo $token ?>>CONFIRMAR</a>
        </div>
        <div id="respuesta_reservacion" style="padding: 20px 0"></div>
      </div>
      <?php } else { ?>
        <p>Reservación caducada no válida para cancelar</p>
      <?php } ?>
    </div>
  </div>
</section>

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
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.fancybox-thumbs.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/jPushMenu.js"></script>
<script src="js/functions.js"></script>
<script src="js/jquery.validate.js"></script>

<!-- Custom functions -->
<script src="js/fn-actividad.js"></script>

</body>
</html>
