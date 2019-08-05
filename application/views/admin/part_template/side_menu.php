<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">SI Ponpes</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="#" onclick="loadMenu('konten/index_konten')">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse7">
        <i class="fas fa-fw fa-table"></i>
        <span>Data Santri</span>
      </a>
      <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Laporan dan Statistik</h6>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('santri') ?>')">Daftar Santri</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Event</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Event</h6>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('acara/acara') ?>')">Jadwal Event</a>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('event') ?>')">Kalendar</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse33">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Pengajaran</span>
      </a>
      <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pengajaran</h6>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('pengajaran/materi') ?>')">Materi Pengajaran</a>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('pengajaran/file') ?>')">File Materi</a>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('pengajaran/pengajar') ?>')">Pengajar</a>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('pengajaran/ruangan') ?>')">Ruangan</a>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('pengajaran/jam') ?>')">Jam Pengajaran</a>
          <a class="collapse-item" href="#" onclick="loadMenu('<?php echo base_url('pengajaran/jadwal') ?>')">Jadwal</a>
        </div>
      </div>
    </li>
    
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>