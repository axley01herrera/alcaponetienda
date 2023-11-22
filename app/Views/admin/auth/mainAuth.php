<!DOCTYPE html>
<html>
<?php echo view('layouts/header'); ?>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('<?php echo base_url('assets/media/auth/bg4.jpg'); ?>');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?php echo base_url('assets/media/auth/bg4-dark.jpg'); ?>');
            }
        </style>
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">

            <div class="d-flex flex-column-fluid justify-content-center justify-content-center p-12 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                        <div class="form w-100">
                            <div class="text-center mb-11">
                                <!-- Logo -->
                                <span class="mb-7">
                                    <img alt="Logo" src="<?php echo base_url('assets/media/logos/logoDark.png'); ?>" class="w-50" />
                                </span>
                                <h1 class="text-dark fw-bolder mb-3">Inicio de Sesión</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Introduzca su Clave de Acceso</div>
                            </div>
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Administador</span>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Clave de Acceso" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="d-grid mb-10">
                                <button type="button" id="btn-signin-admin" class="btn btn-primary">Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>