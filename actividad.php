<?php
    /*
     * CBC Admin - Pagina de inicio
     * 
     */
    
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-actividad.php" );
    
    if( isset( $_GET["id"] ) && ( is_numeric( $_GET["id"] ) ) ){
      $ida = $_GET["id"];
      $actividad = obtenerActividadPorId( $dbh, $ida );
      $fechas = obtenerFechasActividad( $dbh, $ida );
    } else $actividad = NULL;
    if( $actividad == NULL ) header('Location: index.php');
    
    $titulo_pagina = $actividad["nombre"];
    
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title><?php echo $titulo_pagina; ?> | Coco Beauty Club</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/icomoon-fonts.css">
<link rel="stylesheet" type="text/css" href="css/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/jPushMenu.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400%7COpen+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/onepage.css">
<link rel="stylesheet" type="text/css" href="css/loader.css">

<link rel="shortcut icon" href="images/favicon.png">
<style type="text/css">
  .img_act{
    max-height: 400px;
  }
  .horas_act{
    padding: 8px;
  }

  #frm-reservacion label{
    color: rgba(0,0,0,.26);
  }
  .form-control{
    border-top: none; 
  }
  #frm_nactividad{ font-weight: bolder; font-size: 18px }
  /*.table-bordered{ width: 90% }*/
</style>
</head>

<body id="page-top" data-spy="scroll" data-target="#fixed-collapse-navbar">

<div class="loader">
<div class="spinner">
  <div class="dot1"></div>
  <div class="dot2"></div>
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


<section class="innerpage-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-right">
        <h2><?php echo $actividad["nombre"]?></h2>
        <p class="tagline">Hidratación facial</p>
      </div>
    </div>
  </div>
</section>

<!-- Blog Starts Here -->
<section id="area-main" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="blog-item"> 
          <img src="images/<?php echo $actividad["imagen"]?>" 
          class="img-responsive img_act" alt="Hidratación" height="400">
          <div class="blog-content"> 
            <p><?php echo $actividad["descripcion"]?></p>
          </div>
          <div class="post-tag clearfix"> 
            <table class="table table-bordered table-striped mb-none" id="">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Horario</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ( $fechas as $ha ) { 
                    $horas = obtenerHorariosActividadPorFecha( $dbh, $ida, $ha["date"] );
                ?> 
                <tr class="gradeX">
                  <td><?php echo $ha["fecha"] ?></td>
                  <td>
                    <select id="selhr_act" name="" class="horas_act">
                      <option>Seleccione</option>
                      <?php foreach ( $horas as $hr ) { ?>
                        <option value="<?php echo $h["id"] ?>"><?php echo $hr["hora"] ?></option>
                      <?php } ?>
                    </select>
                    <a class="lnk_confirm" href="#!" data-toggle="modal" 
                    data-target="#form-reservacion" 
                    data-nactividad="<?php echo $actividad["nombre"]?>" 
                    data-ida="<?php echo $actividad["id"]?>" data-fecha="<?php echo $ha['fecha'] ?>"
                    >Confirmar</a>
                  </td>                  
                </tr>
                <?php } ?> 
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <aside class="col-md-4 col-sm-4">
        
        <div class="widget"> 
          <h4>Otras actividades</h4>
          <ul class="category">
            <li><a href="#.">Maquillaje</a></li>
            <li><a href="#.">Manicura</a></li>
          </ul>
        </div>
        
      </aside>
    </div>
  </div>
</section>

<?php include( "secciones/form-reservacion.php" ); ?>

<!-- Footer-->
<footer class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"> 
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <ul class="breadcrumb">
          <li><a href="index.php" class="page-scroll">Coco Beauty Club</a></li>
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
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.fancybox-thumbs.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/jPushMenu.js"></script>
<script src="js/functions.js"></script>


<!-- Custom functions -->
<script src="js/fn-actividad.js"></script>
</body>
</html>
