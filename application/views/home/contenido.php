<?php if($this->session->userdata('isUserLoggedIn')){  ?>

<?php //'articulos',10
$info=$this->db->query("SELECT articulos.id,titulo,resumen,descripcion,date_format(fecha,'%W %d %M of %Y') as fecha, users.name FROM `articulos` INNER JOIN users ON articulos.user = users.id")->result();

foreach($info as $art)
{
    
?>
    <a  name="services"></a>
    <div class="content-section-a" style="background:#C0C0C0;">

        <div class="container" >
            <div class="row">
                <div class="col-lg-7 col-sm-6">
                    
                    <h2 class="section-heading"><?=$art->titulo?><br></h2>
                    <textarea cols="30" rows="10" readonly class="form-control"><?=$art->descripcion?> </textarea>
                </div>
                <div class="col-lg-5 col-sm-6">
            
                <img style="height:300px;" class="img-responsive" src="<?=base_url('articulos_fotos/'."$art->id".'.jpg');?>" alt="Fotos de los articulos">
              
                <div class="text-right">
                    <?php /*setlocale(time,'spanish');*/  echo "<a>Publishied on ".$art->fecha."</a>"  ?>
                </div>
                
                <a href='#Modal<?=$art->id;?>' data-toggle="modal"  class="btn btn-info btn-block">Ver</a>
            
            </div>
          <?php echo "<a>Publishied By ".$art->name."</a>"  ?>    
               
            </div>

        </div>
        <!-- /.container -->

    </div>


   <!-- Portfolio Modals -->
   <div class="portfolio-modal modal fade" id="Modal<?=$art->id;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 ">
                    
                    <div class="modal-body">
                    
                    <div class="text-right">
                    
                    <?php
                    if($user['name']==$art->name) {?>
                    
                    <a href="<?=base_url("art/editar/{$art->id}");?>" class="btn btn-warning">Editar</a>
                    <a href="<?=base_url("art/del/{$art->id}");?>" id="del" onclick='return confirm("Seguro?");' class="btn btn-danger">Eliminar</a>

                    <?php }else{  ?>
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

                    <?php }?>
                
                </div>       
                    
                            <h2><?=$art->titulo?></h2>
                            <hr class="star-primary">

                            <img alt="No se posteo una imagen :(    editala!" style="margin-right:.5em;height:400px;width:350px;" class="img-thumbnail" src="<?=base_url('articulos_fotos/'."$art->id".'.jpg');?>">
                            
                            <div class="col-lg-8 " style="float:right;">
                             <h3>Descripcion</h3>           
                            <p> <?=$art->descripcion?></p>
                            <br>
                            <h3>Resumen</h3> 
                            <article class="lead"><?=$art->resumen?> </article>    
                        </div>
                            
                            <ul style="float:left;" class="list-inline item-details">
                                <li>Date:
                                    <strong><a><?=$art->fecha?></a></strong>
                                </li>
                            </ul>
                        
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>


	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Contactanos:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.youtube.com/channel/UCB7D1m_X4hcH3i7DbNFtxwg?view_as=subscriber" class="btn btn-default btn-lg"><i class="fa fa-youtube fa-fw"></i> <span class="network-name">Youtube</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/alfredo00sd" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/alfredo-acosta-pe%C3%B1a-3837a7144/" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
    <?php }else{ ?>

        <?php //'articulos',10
$info=$this->db->query("SELECT articulos.id,titulo,resumen,descripcion,date_format(fecha,'%W %d %M of %Y') as fecha, users.name  FROM `articulos` INNER JOIN users ON articulos.user = users.id ORDER BY id DESC LIMIT 5")->result();

foreach($info as $art)
{
?>
    
    <a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-6">
                    
                    <h2 class="section-heading"><?=$art->titulo?><br></h2>
                    <textarea cols="30" rows="10" readonly class="form-control"><?=$art->descripcion?> </textarea>
                
                </div>
                <div class="col-lg-5  col-sm-6">
            
                <img style="height:300px;" class="img-responsive" src="<?=base_url('articulos_fotos/'."$art->id".'.jpg');?>" alt="Fotos de los articulos">
                <div class="text-right"><?php /*setlocale(time,'spanish');*/  echo "<a>Publishied on ".$art->fecha."</a>"  ?></div>
                
                <a href='#Modal<?=$art->id;?>' data-toggle="modal"  class="btn btn-info btn-block">Ver</a>
            
            </div>
            <?php echo "<a>Publishied By ".$art->name."</a>"  ?>    
            
        </div>

        </div>
        <!-- /.container -->

    </div>


   <!-- Portfolio Modals -->
   <div class="portfolio-modal modal fade" id="Modal<?=$art->id;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                    
                    <div class="modal-body">
                    <h4>Logeate Para poder ver y gestionar tus articulos <a href="<?=base_url('users/login')?>">Log in</a></h4>
                    <div class="text-left">
                            <h2><?=$art->titulo?></h2>
                    </div>
                            <hr class="star-primary">

                            <img alt="No se posteo una imagen :(    editala!" style="margin-right:.5em;height:400px;width:350px;" class="img-thumbnail" src="<?=base_url('articulos_fotos/'."$art->id".'.jpg');?>">
                            
                            <div class="col-lg-8 " style="float:right;">
                            <h3>Descripcion</h3>   
                            <p> <?=$art->descripcion?></p>
                            <h3>Resumen</h3>
                            <article class="lead"><?=$art->resumen?> </article>    
                        </div>
                            
                            <ul style="float:left;" class="list-inline item-details">
                                <li>Date:
                                    <strong><a><?=$art->fecha?></a></strong>
                                </li>
                            </ul>
                        
                        </div>
                    
                    </div>
                    <div class="text-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>       
                    
                </div>
            </div>
        </div>
    </div>

    <?php } ?>

        <?php } ?>
        