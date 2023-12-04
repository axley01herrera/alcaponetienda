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
            <div class="card mb-5 mb-xl-10 shadow">
                <div class="card-header border-0">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative ">
                            <h5>Listado de Productos</h5>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div id="search-product"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt-product" class="table no-footer">
                            <thead>
                                <tr class="fs-5 fw-bold" style="background-color: #f9f9f9;">
                                    <th>Producto</th>
                                    <th>Código</th>
                                    <th>Cat</th>
                                    <th>Sub Cat</th>
                                    <th>P.Costo</th>
                                    <th>P.Venta</th>
                                    <th>P.Prof</th>
                                    <th class="text-end"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $p) { ?>
                                    <tr class="fs-7" style="vertical-align: middle;">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span href="" class="symbol symbol-50px">
                                                    <?php
                                                    if (empty($p->photo))
                                                        $urlImage = 'background-image: url(' . base_url('public/assets/media/stock/ecommerce/76.png') . ')';
                                                    else
                                                        $urlImage = 'background-image: url(data:image/png;base64,' . base64_encode($p->photo) . ')';
                                                    ?>
                                                    <span class="symbol-label" style="<?php echo $urlImage; ?>"></span>
                                                </span>
                                                <div class="ms-5">
                                                    <span class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name"><?php echo $p->productName; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $p->productCode; ?></td>
                                        <td><?php echo $p->category; ?></td>
                                        <td><?php echo $p->subCategory; ?></td>
                                        <td>€<?php echo number_format($p->productCost, 2, ".", ','); ?></td>
                                        <td>€<?php echo number_format($p->productPrice, 2, ".", ','); ?></td>
                                        <td>€<?php echo number_format($p->profesionalProductPrice, 2, ".", ','); ?></td>
                                        <td class="text-end">
                                            <a data-product-id="<?php echo $p->productID; ?>" href="#" class="btn btn-sm btn-light btn-active-color-primary edit-product" title="Editar Producto"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

    var dtProduct = $('#dt-product').DataTable({ // Data Table
        dom: 'RfrtlpiB',
        destroy: true,
        processing: true,
        language: {
            url: '<?php echo base_url('assets/js/dataTable/es.json'); ?>'
        },
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Todo"]
        ],
        buttons: [],
        initComplete: function(settings, json) {
            $('#search-product').html('');
            $('#dt-product_filter').appendTo('#search-product');
        }
    }); // ok

    dtProduct.on('click', '.edit-product', function(e) {
        e.preventDefault();
        let productID = $(this).attr('data-product-id');
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/modalProduct'); ?>",
            data: {
                'action': "update",
                'productID': productID
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
</script>