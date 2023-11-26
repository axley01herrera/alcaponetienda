<div class="d-flex flex-column flex-column-fluid">
    <!-- Page Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!-- Page Title -->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Categrías
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
                            <a id="add-category" href="#" class="menu-link px-3">Agregar Categoría</a>
                        </div>
                        <!-- Menu item -->
                        <div class="menu-item px-3">
                            <a id="add-subCategory" href="#" class="menu-link px-3">Agregar Sub Categoría</a>
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
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card mb-5 mb-xl-10 shadow">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative ">
                                    <h5>Categorías y Sub Categorías</h5>
                                </div>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body">
                            <div id="main-groupDT"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card mb-5 mb-xl-10 shadow">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative ">
                                    <h5>Listado de Categorías</h5>
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="m-0">
                                    <div id="search-cat"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="main-categoryDT"></div>
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-10 shadow">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative ">
                                    <h5>Listado de Sub Categorías</h5>
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="m-0">
                                    <div id="search-subCat"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="main-subCategoryDT"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        groupCat();
        categoryDT();
        subCategoryDT();

        $('#add-category').on('click', function(e) { // Add Category
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('ControlPanel/modalCat') ?>",
                data: {
                    'action': 'create'
                },
                dataType: "html",
                success: function(res) {
                    $('#app-modal').html(res);
                },
                error: function(error) {
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
                }
            });
        }); // ok

        $('#add-subCategory').on('click', function(e) { // Add Sub Category
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('ControlPanel/modalSubCat') ?>",
                data: {
                    'action': 'create'
                },
                dataType: "html",
                success: function(res) {
                    $('#app-modal').html(res);
                },
                error: function(error) {
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
                }
            });
        }); // ok
    });

    function groupCat() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ControlPanel/groupCat'); ?>",
            data: "",
            dataType: "html",
            success: function(res) {
                $('#main-groupDT').html(res);
            },
            error: function(e) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    } // ok

    function categoryDT() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ControlPanel/categoryDT'); ?>",
            data: "",
            dataType: "html",
            success: function(res) {
                $('#main-categoryDT').html(res);
            },
            error: function(e) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    } // ok

    function subCategoryDT() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ControlPanel/subCategoryDT'); ?>",
            data: "",
            dataType: "html",
            success: function(res) {
                $('#main-subCategoryDT').html(res);
            },
            error: function(e) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    } // ok
</script>