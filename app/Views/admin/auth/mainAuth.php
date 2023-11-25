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
                            <!-- Input Access Key -->
                            <div class="fv-row mb-8">
                                <input type="password" id="txt-accessKey<?php echo $uniqid; ?>" placeholder="Clave de Acceso" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <!-- Button Sig In Admin -->
                            <div class="d-grid mb-10">
                                <button type="button" id="btn-signin-admin<?php echo $uniqid; ?>" class="btn btn-primary">Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        let msg = "<?php echo $msg; ?>";
        if (msg == "sessionExpired")
            simpleAlert('warning', 'Su Sesión ha Expirado!');

        $('#btn-signin-admin<?php echo $uniqid; ?>').on('click', function() { // Sign In
            let accessKey = $('#txt-accessKey<?php echo $uniqid; ?>').val();
            if (accessKey != "") {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('Auth/loginAdmin'); ?>",
                    data: {
                        'accessKey': accessKey
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.error == 0) { // Success
                            window.location.href = "<?php echo base_url('ControlPanel/dashboard'); ?>"
                        } else if (res.error == 1) { // Error
                            if (res.msg == "INVALID_ACCESS_KEY") {
                                simpleAlert('warning', 'Rectifique su Clave de Acceso!', 'center');
                                $('#txt-accessKey<?php echo $uniqid; ?>').addClass('is-invalid');
                            } else if (res.msg == "NOT_FOUND") {
                                simpleAlert('error', 'Ha ocurrido un error, pongase en contacto con el creador del sistema!', 'center');
                            }
                        }
                    },
                    error: function(e) {
                        simpleAlert('error', 'Ha ocurrido un error!', 'center');
                    }
                });
            } else {
                simpleAlert('warning', 'Introduzca su Clave de Acceso!', 'center');
                $('#txt-accessKey<?php echo $uniqid; ?>').addClass('is-invalid');
            }
        });

        $('#txt-accessKey<?php echo $uniqid; ?>').on('focus', function() {
            $(this).removeClass('is-invalid');
        });
    });
</script>