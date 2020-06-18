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
            <li class="<?php echo ($this->uri->segment(1) == 'dashboard' ? 'active' : '');?>">
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'monitoring' ? ' active menu-open' : '');?>">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i> <span>Monitoring</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2) == 'data' ? 'active' : '');?>">
                        <a href="<?php echo base_url('monitoring/data');?>"><i class="fa fa-circle-o"></i> Data Mahasiswa</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'grafik' ? 'active' : '');?>">
                        <a href="<?php echo base_url('monitoring/grafik');?>"><i class="fa fa-circle-o"></i> Grafik By Perguruan Tinggi</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'grafik-all' ? 'active' : '');?>">
                        <a href="<?php echo base_url('monitoring/grafik-all');?>"><i class="fa fa-circle-o"></i> Grafik All</a>
                    </li>
                </ul>
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
                </ul>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master' ? ' active menu-open' : '');?>">
                <a href="javascript:;">
                    <i class="fa fa-briefcase"></i> <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2) == 'pengguna' ? 'active' : '');?>">
                        <a href="<?php echo base_url('master/pengguna');?>"><i class="fa fa-circle-o"></i> Pengguna</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'instansi' ? 'active' : '');?>">
                        <a href="<?php echo base_url('master/instansi');?>"><i class="fa fa-circle-o"></i> Perguruan Tinggi</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'pendidikan' ? 'active' : '');?>">
                        <a href="<?php echo base_url('master/pendidikan');?>"><i class="fa fa-circle-o"></i> Pendidikan</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'bank' ? 'active' : '');?>">
                        <a href="<?php echo base_url('master/bank');?>"><i class="fa fa-circle-o"></i> Bank</a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(2) == 'status-jabatan' ? 'active' : '');?>">
                        <a href="<?php echo base_url('master/status-jabatan');?>"><i class="fa fa-circle-o"></i> Status Jabatan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>