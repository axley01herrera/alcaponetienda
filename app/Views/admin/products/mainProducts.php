<div class="d-flex flex-column flex-column-fluid">
    <!-- Page Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!-- Page Title -->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Productos
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="card-toolbar">
                    <!-- Menu -->
                    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                        <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">
                        <!-- Menu item -->
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Acciones</div>
                        </div>
                        <!-- Menu separator -->
                        <div class="separator mb-3 opacity-75"></div>
                        <!-- Menu item -->
                        <div class="menu-item px-3">
                            <a id="add-product" href="#" class="menu-link px-3">Agregar Producto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!-- Page Container -->
        <div id="kt_app_content_container" class="app-container container-xxl">
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#add-product').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "<?php echo base_url('ControlPanel/modalProduct'); ?>",
                data: {
                    'action': "create"
                },
                dataType: "html",
                success: function(res) {
                    $('#app-modal').html(res);
                },
                error: function(error) {
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
                }
            });
        });
    });
</script>