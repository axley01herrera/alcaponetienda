<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!-- Title -->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Productos</h1>
            </div>
            <!-- Title -->
            <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
        </div>
    </div>
    <!-- Page Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!-- Page Container -->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="main-products"></div>
        </div>
    </div>
</div>
<script>
    products();

    function products() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Home/products'); ?>",
            data: {

            },
            dataType: "html",
            success: function(response) {
                $('#main-products').html(response);
            },
            error: function(error) {
                simpleAlert('error', 'Ha ocurrido un error');
            }
        });
    }
</script>