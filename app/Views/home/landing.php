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
                                        <!-- Item -->
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#home" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Inicio</a>
                                        </div>
                                        <!-- Item -->
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#cat" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Catálogo</a>
                                        </div>
                                        <!-- Item -->
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#op" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Opiniones</a>
                                        </div>
                                        <!-- Item -->
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#prof" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Profesionales</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-equal text-end ms-1">
                                <a href="#" class="btn btn-success">Inicio de Sessión</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="home" class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
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

            <div id="cat" class="mb-20 position-relative z-index-2">
                <div class="container">
                    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                        <div class="card-body p-lg-20">
                            <div class="text-center mb-5 mb-lg-10">
                                <h3 class="fs-2hx text-dark mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">Catálogo</h3>
                            </div>
                            <div class="d-flex flex-center mb-5 mb-lg-15">
                                <!-- Categories Tabs -->
                                <ul class="nav border-transparent flex-center fs-5 fw-bold">
                                    <?php foreach ($categories as $index => $cat) { ?>
                                        <li class="nav-item">
                                            <a data-cat-id="<?php echo $cat->id; ?>" class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 tab <?php if ($index == 0) {
                                                                                                                                                            echo 'active';
                                                                                                                                                            $catID = $cat->id;
                                                                                                                                                        } ?>" href="#" data-bs-toggle="tab"><?php echo $cat->cat; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- Categories Tabs content -->
                            <div id="cat-content"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="op" class="container">
                <div class="text-center mb-17">
                    <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">Lo que dicen nuestros clientes!</h3>
                    <div class="fs-5 text-muted fw-bold">Opiniones de Nuestros Clientes
                        <br>recogidas de diferentes medios y redes sociales.
                    </div>
                </div>
                <div class="row g-lg-10 mb-10 mb-lg-20">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                            <div class="mb-7">
                                <div class="rating mb-6">
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                </div>
                                <div class="fs-2 fw-bold text-dark mb-3">Calidad
                                    <br>en los productos
                                </div>
                                <div class="text-gray-500 fw-semibold fs-4">Al trabajar con primeras marcas la calidad de los productos y herramientas son exepcionales.</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px me-5">
                                    <img src="<?php echo base_url('public/assets/media/avatars/300-1.jpg'); ?>" class="" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
                                    <span class="text-muted d-block fw-bold">Profesional de Barbería</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                            <div class="mb-7">
                                <div class="rating mb-6">
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                </div>
                                <div class="fs-2 fw-bold text-dark mb-3">Seriedad
                                    <br>y confianza
                                </div>
                                <div class="text-gray-500 fw-semibold fs-4">El equipo de Alcapone Tiendas brinda una sensación en todo momento de profesionalidad.</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px me-5">
                                    <img src="<?php echo base_url('public/assets/media/avatars/300-2.jpg'); ?>" class="" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Janya Clebert</a>
                                    <span class="text-muted d-block fw-bold">Profesional de Peluquería</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                            <div class="mb-7">
                                <div class="rating mb-6">
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-5"></i>
                                    </div>
                                </div>
                                <div class="fs-2 fw-bold text-dark mb-3">Buen servicio
                                    <br>y atención al cliente
                                </div>
                                <div class="text-gray-500 fw-semibold fs-4">En mi experiencia el servicio y la atención al cliente de Alcapone Tiendas es exelente.</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px me-5">
                                    <img src="<?php echo base_url('public/assets/media/avatars/300-15.jpg'); ?>" class="" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Raúl Lopez</a>
                                    <span class="text-muted d-block fw-bold">Profesional de Barbería</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prof" class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
                    <div class="my-2 me-5">
                        <div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">Eres un profesional del sector,
                            <span class="fw-normal">Barbería y/o Peluquería!</span>
                        </div>
                        <div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Tenemos descuentos especiales para tí en todos nuestros productos!</div>
                    </div>
                    <a href="·" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Soy Profesional</a>
                </div>
            </div>
            <div class="mb-0">
                <div class="landing-curve landing-dark-color">
                    <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
                    </svg>
                </div>
                <div class="landing-dark-bg pt-20">
                    <div class="container">
                        <div class="row py-10 py-lg-20">
                            <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                                <div class="rounded landing-dark-border p-9 mb-10">
                                    <h2 class="text-white">Información Importante</h2>
                                    <span class="fw-normal fs-4 text-gray-700">
                                        Nuestro Sitio Web está actualmente en construcción. Pero tiene nuestro catálogo disponible y nuestra Información de Contacto. Si desea obtener alguno de nuestros productos puede ponerse en contacto con nosotros mediante el medio que estime conveniente. Si es usted profesional tenemos descuentos especiales en todos nuestros productos.
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-16">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex fw-semibold flex-column ms-lg-20">
                                        <h4 class="fw-bold text-gray-400 mb-6">Redes Sociales</h4>
                                        <a target="_blank" href="https://www.facebook.com/alcaponebarbertiendas" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="">
                                            <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                        </a>
                                        <a target="_blank" href="https://www.instagram.com/alcaponebarbertiendas/?igshid=NzZhOTFlYzFmZQ%3D%3D" class="mb-6">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="">
                                            <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="landing-dark-separator"></div>
                    <div class="container">
                        <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                            <div class="d-flex align-items-center order-2 order-md-1">
                                <a href="#home">
                                    <img alt="Logo" src="<?php echo base_url('public/assets/media/logos/landingLogoWhite.png'); ?>" class="h-15px h-md-20px">
                                </a>
                            </div>
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                                <li class="menu-item">
                                    <a href="<?php echo base_url('Auth/admin'); ?>" target="_blank" class="menu-link px-2">Administrador</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var catID = "<?php echo $catID; ?>";
    getCatContent();

    $('.tab').on('click', function() {
        $('.tab').each(function() {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        catID = $(this).attr('data-cat-id');
        getCatContent();
    });

    function getCatContent() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Home/getCatContent'); ?>",
            data: {
                'catID': catID,
            },
            dataType: "html",
            success: function(res) {
                $('#cat-content').html(res);
            },
            error: function(e) {
                simpleAlert('error', 'Ha ocurrido un error');
            }
        });
    }
</script>