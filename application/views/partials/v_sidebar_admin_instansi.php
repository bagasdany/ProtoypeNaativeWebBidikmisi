<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('nm_lengkap');?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="">
            <div id="tampil_tanggal_waktu" class="text-center"><?php echo date('d F Y | H:i:s');?></div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'mahasiswa' ? ' active menu-open' : '');?>">
                <a href="javascript:;">
                    <i class="fa fa-users"></i> <span>Mahasiswa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2) == 'proses' ? 'active' : '');?>">
                        <a href="<?php echo base_url('mahasiswa/proses');?>"><i class="fa fa-circle-o"></i> Input Data</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'data' ? 'active' : '');?>">
                        <a href="<?php echo base_url('mahasiswa/data');?>"><i class="fa fa-circle-o"></i> Semua Mahasiswa</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'bina' ? 'active' : '');?>">
                        <a href="<?php echo base_url('mahasiswa/bina');?>"><i class="fa fa-circle-o"></i> Mahasiswa Perlu Pembinaan</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'traccer' ? 'active' : '');?>">
                        <a href="<?php echo base_url('mahasiswa/traccer');?>"><i class="fa fa-circle-o"></i> Mahasiswa Traccer Study</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'grafik' ? 'active' : '');?>">
                        <a href="<?php echo base_url('mahasiswa/grafik');?>"><i class="fa fa-circle-o"></i> Grafik Data</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>