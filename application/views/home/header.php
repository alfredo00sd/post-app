    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <?php if($this->session->userdata('isUserLoggedIn')){?>

                    <div class="intro-message">
                        <h2>Bienvenid@ <?php echo $user['name'];?></h2>
                        <h3><?=$header;?></h3>

                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
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
                    <?php }else{?>
                        <div class="intro-message">
                        <h1>Tarea 9</h1>
                        <h3>Bienvenidos aqui podras ver los ultimos post publicados, para acceder a los tuyos logeate :)</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
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
                    <?php }?>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
