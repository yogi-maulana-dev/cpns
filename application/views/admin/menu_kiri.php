  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <i class="fa fa-user fa-2x" style="color: white;"></i> -->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
    		<li class="active child">
    			<a href="">
    				<i class="fa fa-home"></i> <span>Beranda </span>            
    			</a>
    		 </li>

         <li class="child">
          <a href="#" onclick="eksekusi_controller('admin/admin')">
            <i class="fa fa-user"></i> <span>Admin</span>            
          </a>
         </li>

         <li class="child">
          <a href="#" onclick="eksekusi_controller('admin/pengaturan')">
            <i class="fa fa-wrench"></i> <span>Pengaturan</span>            
          </a>
         </li>

         <li class="child">
          <a href="#" onclick="eksekusi_controller('admin/soal')">
            <i class="fa fa-book"></i> <span>Soal</span>            
          </a>
         </li>

         <li class="child">
          <a href="#" onclick="eksekusi_controller('admin/peserta_ujian')">
            <i class="fa fa-users"></i> <span>Peserta Ujian</span>            
          </a>
         </li>

         <li class="child">
          <a href="#" onclick="eksekusi_controller('admin/jadwal_ujian')">
            <i class="fa fa-clock-o"></i> <span>Jadwal Ujian</span>
          </a>
         </li>

         <li class="child">
          <a href="#" onclick="eksekusi_controller('admin/laporan_nilai')">
            <i class="fa fa-list"></i> <span>Laporan Nilai</span>
          </a>
         </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>