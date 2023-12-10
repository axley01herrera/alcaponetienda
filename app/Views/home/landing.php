<!DOCTYPE html>
<html>
<?php echo view('layouts/header'); ?>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
    <script>
        var themeMode = "light";
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(<?php echo base_url('public/assets/media/svg/illustrations/landing.svg'); ?>)">
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-equal">
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <!-- Logo image-->
                                <span>
                                    <img alt="Logo" src="<?php echo base_url('public/assets/media/logos/landingLogoWhite.png'); ?>" class="logo-default h-25px h-lg-30px" />
                                    <img alt="Logo" src="<?php echo base_url('public/assets/media/logos/landingLogoDark.png'); ?>" class="logo-sticky h-20px h-lg-25px" />
                                </span>
                                <!-- End Logo -->
                            </div>

                            <!-- Menu -->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
                                        <!-- Item 
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="flex-equal text-end ms-1">
                                <a href="#" class="btn btn-success">Inicio de Sessión</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Alcapone Tiendas, productos
                            <br />de
                            <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">barbería</span>
                            </span>
                        </h1>
                        <a href="#" class="btn btn-primary">Regístrate</a>
                    </div>
                    <!-- Brands -->
                    <div class="d-flex flex-center flex-wrap position-relative px-5">
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="JRL">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/jrl.png'); ?>" class="mh-30px mh-lg-40px" alt="JRL" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="WAHL">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/wahl.png'); ?>" class="mh-30px mh-lg-40px" alt="WAHL" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="ALICK GORILLA">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/slickGorilla.png'); ?>" class="mh-30px mh-lg-40px" alt="ALICK GORILLA" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="ANDIS">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/andis.png'); ?>" class="mh-30px mh-lg-40px" alt="ANDIS" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="SEIDO">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/seido.png'); ?>" class="mh-30px mh-lg-40px" alt="SEIDO" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="BABYLISS PRO">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/babylisspro.png'); ?>" class="mh-30px mh-lg-40px" alt="BABYLISS PRO" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="TOMB 45">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/tomb45.png'); ?>" class="mh-30px mh-lg-40px" alt="TOMB 45" />
                        </div>
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KAMISORI">
                            <img src="<?php echo base_url('public/assets/media/svg/brand-logos/kamisori.png'); ?>" class="mh-30px mh-lg-40px" alt="KAMISORI" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
                </svg>
            </div>
            <div class="mb-lg-n15 position-relative z-index-2">
                <div class="container">
                    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                        <div class="card-body p-lg-20">
                            <div class="text-center mb-5 mb-lg-10">
                                <h3 class="fs-2hx text-dark mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">Catálogo</h3>
                            </div>
                            <div class="d-flex flex-center mb-5 mb-lg-15">
                                <!-- Tabs -->
                                <ul class="nav border-transparent flex-center fs-5 fw-bold">
                                    <?php foreach ($categories as $cat) { ?>
                                        <li class="nav-item">
                                            <a id="tab-<?php echo $cat->id; ?>" class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" ><?php echo $cat->cat; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- Tabs content -->
                            <div class="tab-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>