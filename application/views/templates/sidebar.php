<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MUKTI SARANA ABADI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php if ($title == 'Dashboard') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <?php
        $role = $this->session->userdata('role_id');
        $this->db->select('a.id, a.menu');
        $this->db->join('user_access b', 'a.id = b.menu_id');
        $this->db->where('b.role_id', $role);
        $this->db->where('a.id != 3');
        $menu = $this->db->get('user_menu a')->result_array();
        ?>
        <?php foreach ($menu as $m) : ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <?php $sub = $this->db->get_where('user_sub_menu', ['menu_id' => $m['id']])->result_array(); ?>

            <?php foreach ($sub as $s) : ?>
                <!-- Nav Item -->
                <?php if ($s['title'] == $title) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url($s['url']); ?>">
                        <i class="<?= $s['icon']; ?>"></i>
                        <span><?= $s['title']; ?></span></a>
                    </li>
                    <!-- Divider -->
                <?php endforeach; ?>

                <hr class="sidebar-divider d-none d-md-block">

            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">