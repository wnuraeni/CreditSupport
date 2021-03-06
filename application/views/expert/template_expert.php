<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
        <script src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js"></script>
        <script>
            $(document).ready(function(){
               $('.dropdown-toggle').dropdown();
               $('.dropdown input, .dropdown label').click(function(e){
                  e.stopPropagation(); 
               });
            });
        </script>
        <title>KMS Kredit</title>
     </head>
     
    <body>
        <!-- Top Navigation Bar-->
        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <a class="brand"><?php echo $title;?></a>
                <div class="nav-collapse">
                <ul class="nav">
                    <li><a href="<?php echo base_url();?>expert"><i class="icon-home icon-white"></i> Home</a></li>
                    <?php if($this->session->userdata('isExpert') == TRUE){?>
                    <li><a href="<?php echo base_url();?>expert/index/view/profile_user"><i class="icon-user icon-white"></i> Profile</a></li>
                    <li><a href="<?php echo base_url();?>expert/inbox"><i class="icon-envelope icon-white"></i> Inbox</a></li>
                    <?php } ?>
                </ul>
                 <ul class="nav pull-right">
                     <?php if(($this->session->userdata('isExpert') != TRUE)){?>
                     <li class="dropdown"><a href="#" class="dropdown-toggle"><i class="icon-user icon-white"></i> Login<b class="caret"></b></a>
                         <div class="dropdown-menu" style="padding: 15px;">
                             <form action="<?php echo base_url();?>expert/index/process_login" method="POST">
                                 <?php echo '<span class="text-warning">'.$this->session->flashdata('message').'</span>';?>
                                 <label>Username</label><input type="text" name="username" placeholder="Type username here..">
                                 <?php echo form_error('username','<p class="text-error">','</p>');?>
                                 <label>Password</label><input type="password" name="password" placeholder="Type password here...">
                                 <?php echo form_error('password','<p class="text-error">','</p>')?>
                                 <button class="btn btn-primary">Login</button>   
                             </form>
                         </div>
                        <?php 
                        $script_flash = $this->session->flashdata('script');
                        echo empty($script)?'':$script; 
                        echo empty($script_flash)?'':$script_flash; 
                        ?> 
                     </li>
                     <?php } else{ ?>
                     <li><a href="#">Welcome, <?php echo $this->session->userdata('expertname');?></a></li>
                     <li><a href="<?php echo base_url();?>expert/index/logout">Logout</a></li>
                     <?php } ?>
                 </ul>
                </div>
            </div>
        </div> <!-- end of top navigation bar -->
        <!-- Hero Unit -->
        <div class="hero-unit">
            <img src="<?php echo base_url();?>img/logo.png" width="100" height="100">Welcome to KMS Kredit Back-end Expert Page!!
        </div>
        <!-- End of hero unit -->
        <br>
        <!-- Container-->
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Sidebar menu -->
                <div class="span3">
                    <div class="sidebar-nav">
                        <?php if(($this->session->userdata('isExpert') == TRUE)){ ?>
                        <ul class="nav nav-list">
                            <!-- Menu Khusus Expert -->
                            <li><a href="#">Pengguna</a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>expert/index/view_data/anggota">Anggota</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url()?>expert/index/view_data/profil_perusahaan">Profil Perusahaan</a></li>
                            <li><a href="<?php echo base_url();?>expert/index/view_data/simulasi">Simulasi</a></li>
                            <li><a href="<?php echo base_url();?>expert/index/view_data/pertanyaan">Pertanyaan</a></li>
                            <li><a href="<?php echo base_url();?>expert/index/view_data/pengguna">Artikel</a></li>
                            <li><a href="<?php echo base_url();?>expert/index/view_data/pengguna">Dokumen</a></li>
                        </ul>
                        <?php } ?>
                    </div>
                </div><!-- sidebar menu -->
                <!-- main content -->
                <div class="span9">
                    <?php 
                    empty($content)?'':($this->load->view($content));
                    ?>
                </div><!-- end of main content-->
            </div>
            <footer>&copy; Copyright 2012 </footer>
        </div><!-- container-fluid -->
    </body>
</html>