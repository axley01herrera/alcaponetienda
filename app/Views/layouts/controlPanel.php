<?php echo view('layouts/header'); ?>

<body id="kt_app_body" data-kt-app-layout="dark-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var themeMode = "light";
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!-- Page -->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!-- Header -->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
                <!-- Header container -->
                <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    <!--Logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                        <img alt="Logo" src="<?php echo base_url('public/assets/media/logos/default-dark.svg'); ?>" class="h-20px h-lg-30px app-sidebar-logo-default" />
                    </div>
                    <!-- Header wrapper -->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                        <!-- Menu wrapper -->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!-- Menu -->
                            <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                                <!-- Dashboard -->
                                <a href="<?php echo base_url('ControlPanel/dashboard'); ?>" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                                    <span class="menu-link <?php echo @$activeDashboard; ?>">
                                        <span class="menu-title">Tablero</span>
                                    </span>
                                </a>
                                <!-- Categories -->
                                <a href="<?php echo base_url('ControlPanel/catgories'); ?>" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                                    <span class="menu-link <?php echo @$activeCat; ?>">
                                        <span class="menu-title">Categorías</span>
                                    </span>
                                </a>
                                <!-- Products -->
                                <a href="<?php echo base_url('ControlPanel/products'); ?>" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                                    <span class="menu-link <?php echo @$activeProducts; ?>">
                                        <span class="menu-title">Productos</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- Navbar -->
                        <div class="app-navbar flex-shrink-0">
                            <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                                <a href="<?php echo base_url('Auth/admin'); ?>" class="btn btn-sm btn-danger">Salir</a>
                            </div>
                            <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-element-4 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="app-modal"></div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <?php echo view(@$page); ?>
                </div>
            </div>
            <!-- Footer -->
            <?php echo view('layouts/footer'); ?>
        </div>
    </div>
</body>