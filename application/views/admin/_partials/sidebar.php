<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
	<div class="sidebar-brand-text mx-3">Kampung Anggrek</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
	<a class="nav-link" href="index.html">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
	Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
	<i class="fas fa-fw fa-folder"></i>
		<span>Produk</span>
	</a>
	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header">Data Produk:</h6>
			<a class="collapse-item" href="<?php echo site_url('admin/produk/add') ?>">Tambah Produk</a>
			<a class="collapse-item" href="<?php echo site_url('admin/produk') ?>">Lihat Produk</a>
		</div>
	</div>

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
	Report
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseTwo">
	<i class="fas fa-fw fa-folder"></i>
		<span>Invoices</span>
	</a>
	<div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header">Data Produk:</h6>
			<a class="collapse-item" href="<?php echo site_url('admin/invoices') ?>">Lihat Invoices</a>
		</div>
	</div>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Heading -->
<div class="sidebar-heading">
	User
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapsePages">
	<i class="fas fa-fw fa-cog"></i>
		<span>Admin</span>
	</a>
	<div id="collapseAdmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header">Login User :</h6>
			<a class="collapse-item" href="<?php echo site_url('admin/user/add') ?>">Tambah User</a>
			<a class="collapse-item" href="<?php echo site_url('admin/user') ?>">Lihat User</a>
		</div>
	</div>

	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKonsumen" aria-expanded="true" aria-controls="collapsePages">
	<i class="fas fa-fw fa-cog"></i>
		<span>Konsumen</span>
	</a>
	<div id="collapseKonsumen" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header">Konsumen :</h6>
			<a class="collapse-item" href="<?php echo site_url('admin/user/tampil_konsumen') ?>">Lihat Kosumen</a>
		</div>
	</div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0 btn-sidebar" id="sidebarToggle"></button>
</div>

</ul>
