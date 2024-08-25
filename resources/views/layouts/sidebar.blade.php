 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="pull-left image">
                 <img src="{{ asset('AdminLTE-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
             </div>
             <div class="pull-left info">
                 <p>Alexander Pierce</p>
                 <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
             </div>
         </div>

         <ul class="sidebar-menu" data-widget="tree">
             <li>
                 <a href="">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                 </a>
             </li>

             <li class="header">Master</li>
             <li>
                 <a href="">
                     <i class="fa fa-cube"></i> <span>Kategori</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-cubes"></i> <span>Produk</span>
                 </a>
             </li>
             <li class="treeview">
                 <a href="#">
                     <i class="fa fa-table"></i> <span>Tables</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                     <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                 </ul>
             </li>
             <li>
                 <a href="{{ route('siswa.tampil') }}">
                     <i class="fa fa-users"></i> <span>Siswa</span>
                 </a>
             </li>
             <li>
                 <a href="{{ route('guru.tampil') }}">
                     <i class="fa fa-users"></i> <span>Guru</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-truck"></i> <span>Supplier</span>
                 </a>
             </li>
             <li class="header">Transaksi</li>
             <li>
                 <a href="">
                     <i class="fa fa-money"></i> <span>Pengeluaran</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-download"></i> <span>Pembelian</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-upload"></i> <span>Penjualan</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Lama</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                 </a>
             </li>
             <li class="header">REPORT</li>
             <li>
                 <a href="">
                     <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                 </a>
             </li>
             <li class="header">SYSTEM</li>
             <li>
                 <a href="">
                     <i class="fa fa-users"></i> <span>User</span>
                 </a>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                 </a>
             </li>

         </ul>
     </section>
     <!-- /.sidebar -->
 </aside>
