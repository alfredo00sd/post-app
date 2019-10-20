<?php //'articulos',10
$u=$this->session->userdata('userId');
$info=$this->db->query("SELECT id,titulo,resumen,descripcion,date_format(fecha,'%W %d %M of %Y') as fecha,user FROM `articulos` WHERE user = {$u}")->result();

if($info==null){ ?>

    <a  name="services"></a>
    <div class="content-section-a"  style="background:#C0C0C0;">

        <div class="container-fluid" style="margin-top:20px;">
        <div class="jumbotron" style="background:rgba(0,0,0,0.5);">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    
                    <h2 class="section-heading">Aun no has Publicado nada <br></h2>
                    
                </div>
                
            </div>
       </div>
        </div>
        <!-- /.container -->

    </div>

<?php
}else{

foreach($info as $art)
{
    
?>
    <a  name="services"></a>

        <div class="container-fluid" style="margin-top:20px;">
        <div class="jumbotron" style="background:rgba(0,0,0,0.5);;">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    
                    <h2 style="color:#c0c0c0;" class="section-heading"><?=$art->titulo?><br></h2>
                    <article style="color:white" class="lead"><?=$art->descripcion?> </article>
            
                    <a href='#Modal<?=$art->id;?>' data-toggle="modal"  class="btn btn-info btn-block">Ver Resumen</a>

                </div>
                <div class="col-lg-4 col-lg-offset-1 col-sm-6">
            
                <img style="height:300px;" class="img-responsive" src="<?=base_url('articulos_fotos/'."$art->id".'.jpg');?>" alt="Fotos de los articulos">
              
                
                <div class="text-right">
                    <?php /*setlocale(time,'spanish');*/  echo "<a style='color:white;'>Publishied on ".$art->fecha."</a>"  ?>
                </div>
                
                <a href="<?=base_url("art/editar/{$art->id}");?>" class="btn btn-warning">Editar</a>
                <a href="<?=base_url("art/del/{$art->id}");?>" onclick='return confirm("Seguro?");' class="btn btn-danger">Eliminar</a>
                    
            </div>

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
                      
                        <article class="lead"><?=$art->resumen?> </article>    
                        </div>
                            
                            <ul style="float:left;" class="list-inline item-details">
                                <li>Date:
                                    <strong><a><?=$art->fecha?></a></strong>
                                </li>
                            </ul>
                            </div> 
                    <div class="text-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>                    
                    </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php } } ?>
    <!-- jQuery -->
    <script src="<?=base_url('js/jQuery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('js/bootstrap.min.js');?>"></script>
