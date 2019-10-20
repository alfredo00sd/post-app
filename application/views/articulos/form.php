<div class="container" style="margin-top:80px;">
<div class="jumbotron" style="background:rgba(0,0,0,0.5);">

<div class="text-center">
    <h2 style="color:white;"><?=$ArtTitle?><h2><hr>
</div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col col-md-2"></div> 
    <div class="col col-md-8">
    <input type="hidden"  name="id" value="<?php if(isset($id)){echo $id;} else{echo "";} ?>">    
    <div class="form-group">
            <input type="text" class="form-control" value="<?php if(isset($titulo)){echo $titulo;} else{echo "";}?>" name="titulo" placeholder="titulo" required>
        </div>
        <div class="form-group">
            <textarea id="summernote" name="resumen" class="form-control" cols="15" rows="5" required placeholder="Resumen"><?php if(isset($resumen)){echo $resumen;} else{echo "";}?></textarea>
        </div>
        <div class="form-group">
            <textarea name="descripcion" class="form-control" cols="15" rows="5" required placeholder="Descripcion"><?php if(isset($descripcion)){echo $descripcion;} else{echo "";}?></textarea>
        </div>
        <div class="form-group"> 
       <!-- File input field -->
       <div id="imagePreview" class="img-thumbnail" ></div>
<input required type="file" name="foto" class="form-control" id="file" onchange="return fileValidation()"/>
<!-- Image preview -->
       </div>
        <div class="form-group">
            <input name="publicar" type="submit" onclick="listo();" <?php if(isset($id)){/*Si hay id editamos*/ echo " class='btn btn-success btn-block' value='Modificar' "; } else{/*Si no hay pos es uno nuevo*/ echo "class='btn btn-primary btn-block' value='Publicar' ";} ?>/>
        </div>
        </div>
        </div>
    </form>
</div>
</div>
