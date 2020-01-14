<?php use Lidiun_Framework_v7\App;?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon">
      <img src="/image/icon/logo.png" width="80%">
    </div>
    <div class="sidebar-brand-text mx-3" style="width: 200%;">App Name</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider d-md-block">

    <!-- Heading -->
  <div class="sidebar-heading">
    Categoria
  </div>

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link" href="/app/app1">
      <i class="fas fa-store"></i>
      <span>Application 1</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

   <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link" href="/app/app2">
      <i class="fas fa-calculator"></i>
      <span>Application 2</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

<style type="text/css">
  .nav-link{padding: 0.3rem 1rem !important;}
</style>