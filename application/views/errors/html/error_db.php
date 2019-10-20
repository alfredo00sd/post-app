<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Database Error</title>
<link href="<?=base_url('css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url('css/landing-page.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url('font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
   include libraries(jQuery, bootstrap) -->
</head>
<body style="background-image:url(<?=base_url('img/banner-bg.jpg')?>);">

<div id="container">
<div class="jumbotron">
<div class="row">
    <div class="col col-md-3"></div> 
    <div class="col col-md-6">
    
		<h3>Hemos tenido Problemas en encotrar la base de datos, pero podemos configurar una nueva.</h3>
		<a class="btn btn-warning" href="<?=base_url('install.php')?>">Reparar</a>
</div>
	</div>
	</div>
</body>
</html>