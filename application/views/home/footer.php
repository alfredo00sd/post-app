
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><div class="text-center">
                    <p class="copyright text-muted small"><?php $date=date('D-d-M-Y'); echo "Copyright &copy; Alfredo Acosta 2015-2933 All Rights Reserved {$date}";?></p>
                </div>
            </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?=base_url('js/jQuery.js');?>"></script>

<script>
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg)$/i;
    if(!allowedExtensions.exec(filePath)){
        sweetAlert("Oops...", "Esto no es una imagen, solo se aceptan imagenes del tipo .jpg", "error");
        //alert('');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img class="img-responsive" style="maxheight:400px;maxwidth:350px;" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('js/bootstrap.min.js');?>"></script>


<!-- include summernote css/js-->
<script src="<?=base_url('js/summernote/ajax/summernote.js');?>"></script>
<script src="<?=base_url('js/sweetalert.min.js');?>"></script>   
<script src="<?=base_url('js/summernote/summernote.js');?>"></script>   

<script>

$('#summernote').summernote({
  height: 200,                 // set editor height
  minHeight: 100,             // set minimum height of editor
  maxHeight: 400,             // set maximum height of editor
  focus: true,
                    // set focus to editable area after initializing summernote
   placeholder: 'Escribe el resumen del articulo...',
   toolbar: [
    //[groupName, [list of button]],
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']]
  ]
});  
  </script>
</body>

</html>
