<!DOCTYPE html>
<html>
<?php echo view('layouts/header'); ?>

<body id="kt_app_body" data-kt-app-layout="dark-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var themeMode = "light";
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!-- Page -->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="app-modal"></div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <?php echo view($page); ?>
                </div>
            </div>
            <!-- Footer -->
            <?php echo view('layouts/footer'); ?>
        </div>
    </div>
</body>

</html>