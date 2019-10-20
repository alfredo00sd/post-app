
<body style="background-image:url('<?=base_url('img/banner-bg.jpg');?>');">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="<?=base_url('home')?>"><span class='glyphicon glyphicon-inbox'></span> <?=$App?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <?php if($this->session->userdata('isUserLoggedIn')){ ?>
                <li class="page-scroll">
                    <a href="<?= base_url('art/nuevo')?>">
                    Nuevo Post <span class='glyphicon glyphicon-plus'></span></a>
                    </li>    
                <li>
                        <a href="<?= base_url('users/posts')?>">Mis Posts <span class='glyphicon glyphicon-tag'></span></a>
                    </li>
                    
                    <li class="page-scroll">
                    <a href="<?= base_url('users/account')?>">
                    Perfil <span class='glyphicon glyphicon-user'></span></a>
                    </li>

                    <li class="page-scroll">
                    <a href="<?= base_url('users/logout')?>">
                    Cerrar session <span class='glyphicon glyphicon-log-out'></span></a>
                    </li>
                    <?php }else{ ?>

                    <li class="page-scroll">
                    <a href="<?= base_url('users/login')?>">
                    <span class='glyphicon glyphicon-user'></span> Iniciar session</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
