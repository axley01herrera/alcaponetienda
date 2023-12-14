<div class="d-flex flex-column flex-column-fluid">
    <!-- Page Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!-- Page Title -->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Detalle del Producto
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="card-toolbar">
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!-- Page Container -->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Photo</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <!-- Image input -->
                            <!-- Image Input -->
                            <div id="kt_image_input_profile<?php echo $uniqid; ?>" class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url('public/assets/media/avatars/img.png'); ?>)">
                                <!-- Image Preview -->
                                <?php if (empty($product[0]->photo)) { ?>
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo base_url('public/assets/media/avatars/img.png'); ?>)"></div>
                                <?php } else { ?>
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url(data:image/png;base64,<?php echo base64_encode($product[0]->photo); ?>)"></div>
                                <?php } ?>
                                <!-- Edit Button -->
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cambiar">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
                                    <!-- Inputs -->
                                    <input id="avatar<?php echo $uniqid; ?>" type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <!-- Cancel button -->
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancelar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <!-- Remove button -->
                                <?php if (!empty($product[0]->photo)) { ?>
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remover">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="text-muted fs-7">* .png * .jpg * .jpeg</div>
                        </div>
                    </div>
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-50oa">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Estado</h2>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-130-uoiu">
                            <select id="sel-status<?php echo $uniqid; ?>" class="form-select">
                                <option value="0" <?php if ($product[0]->status == 0) echo "selected"; ?>>Incativo</option>
                                <option value="1" <?php if ($product[0]->status == 1) echo "selected"; ?>>Activo</option>
                            </select>
                            <div class="text-muted fs-7 mt-2">La visibilidad del producto depende del estado.</div>
                        </div>
                    </div>
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-50oa">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Categoría</h2>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-130-uoiu">
                            <select id="sel-cat<?php echo $uniqid; ?>" class="form-control sel-cat<?php echo $uniqid; ?>">
                                <option value=""></option>
                                <?php foreach ($categories as $cat) { ?>
                                    <option value="<?php echo $cat->id; ?>" <?php if (!empty($catID)) {
                                                                                if ($catID == $cat->id) echo "selected";
                                                                            } ?>><?php echo $cat->cat; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-50oa">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Sub Categoría</h2>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-130-uoiu">
                            <div id="subCats"></div>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-50oa">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Información</h2>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-130-uoiu">
                            <div class="row">
                                <!-- Name -->
                                <div class="col-12 col-md-6 col-lg-6 mb-5">
                                    <label class="fs-6 fw-semibold" for="txt-name<?php echo $uniqid; ?>">Name <span class="text-danger">*</span></label>
                                    <input type="text" id="txt-name<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php echo @strtoupper($product[0]->name); ?>">
                                </div>
                                <!-- Code -->
                                <div class="col-12 col-lg-6 mb-5">
                                    <label class="fs-6 fw-semibold" for="txt-code<?php echo $uniqid; ?>">Código <span class="text-danger">*</span></label>
                                    <input type="text" id="txt-code<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php echo @$product[0]->code; ?>">
                                </div>
                                <!-- Cost -->
                                <div class="col-12 col-md-3 col-lg-3 mb-5">
                                    <label class="fs-6 fw-semibold" for="txt-cost<?php echo $uniqid; ?>">Costo <span class="text-danger">*</span></label>
                                    <input type="number" id="txt-cost<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php if (!empty($product[0]->cost)) echo $product[0]->cost; ?>">
                                </div>
                                <!-- Price -->
                                <div class="col-12 col-md-3 col-lg-3 mb-5">
                                    <label class="fs-6 fw-semibold" for="txt-price<?php echo $uniqid; ?>">Precio <span class="text-danger">*</span></label>
                                    <input type="number" id="txt-price<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php if (!empty($product[0]->price)) echo $product[0]->price; ?>">
                                </div>
                                <!-- Profesional Price -->
                                <div class="col-12 col-md-3 col-lg-3 mb-5">
                                    <label class="fs-6 fw-semibold" for="txt-pprice<?php echo $uniqid; ?>">Precio Profesional <span class="text-danger">*</span></label>
                                    <input type="number" id="txt-pprice<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php if (!empty($product[0]->profesional_price)) echo $product[0]->profesional_price; ?>">
                                </div>
                                <!-- Stock -->
                                <div class="col-12 col-md-3 col-lg-3 mb-5">
                                    <label class="fs-6 fw-semibold" for="txt-stock<?php echo $uniqid; ?>">Stock <span class="text-danger">*</span></label>
                                    <input type="number" id="txt-stock<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" min="0" value="<?php echo @$product[0]->stock; ?>">
                                </div>
                                <!-- Description -->
                                <div class="col-12">
                                    <label class="fs-6 fw-semibold" for="txt-description<?php echo $uniqid; ?>">Descripción</label>
                                    <textarea id="txt-description<?php echo $uniqid; ?>" class="form-control" rows="5"><?php echo @$product[0]->description; ?></textarea>
                                </div>
                                <div class="col-12 mt-10 text-end">
                                    <button id="save-product<?php echo $uniqid; ?>" type="button" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-50oa">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Sube fotos de tu producto</h2>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-130-uoiu">
                            <!-- Dropzone -->
                            <div class="dropzone mb-5" id="kt_dropzonejs_example_1">
                                <div class="dz-message needsclick">
                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Fotos</h3>
                                        <span class="fs-7 fw-semibold text-gray-500">Click para seleccionar!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button id="upload-<?php echo $uniqid; ?>" type="button" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-50oa">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Photos del Producto</h2>
                            </div>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-130-uoiu">
                            <div class="overlay-wrapper h-300px bgi-no-repeat bgi-size-contain bgi-position-center image-placeholder-dozzy-1-1"></div>
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-10 align-items-end pb-3">
                                <!--begin::Path-->
                                <code class="py-2 px-4">
                                    assets/media/illustrations/dozzy-1/1.png </code>
                                <!--end::Path-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var productID = "<?php echo $productID; ?>";
    var catID = "<?php echo @$catID; ?>";
    var subCatID = "<?php echo @$subCatID; ?>";
    getSelSubCatsByCat();

    function getSelSubCatsByCat() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/getSelSubCatsByCat'); ?>",
            data: {
                'catID': catID,
                'subCatID': subCatID
            },
            dataType: "html",
            success: function(res) {
                $('#subCats').html(res);
            },
            error: function(e) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    }

    function updateCat() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/productUpdateCat'); ?>",
            data: {
                'catID': $('#sel-cat<?php echo $uniqid; ?>').val(),
                'productID': productID
            },
            dataType: "json",
            success: function(response) {
                if (response.error === 0)
                    simpleAlert('success', 'Categoría actualizada', 'center');
                else
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
            },
            error: function(error) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    }
</script>

<!-- Avatar Procedure -->
<script>
    var avatarProfile = new KTImageInput.createInstances();
    var imageInputElement = document.querySelector("#kt_image_input_profile<?php echo $uniqid; ?>");
    var imageInput = KTImageInput.getInstance(imageInputElement);

    imageInput.on("kt.imageinput.change", function() { // Upload On Change
        let formData = new FormData();
        formData.append('files', $("#avatar<?php echo $uniqid; ?>")[0].files[0]);
        formData.append('productID', productID);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/uploadProductImg'); ?>",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.error === 0)
                    window.location.reload();
                else if (response.error === 1)
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
            },
            error: function(error) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    });

    imageInput.on("kt.imageinput.cancel", function() { // Remove On Cancel
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/removeProductImg'); ?>",
            data: {
                'productID': productID
            },
            dataType: "json",
            success: function(response) {
                if (response.error === 0)
                    window.location.reload();
                else if (response.error === 1)
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
            },
            error: function(error) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    });

    imageInput.on("kt.imageinput.remove", function() { // Remove On Delete
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/removeProductImg'); ?>",
            data: {
                'productID': productID
            },
            dataType: "json",
            success: function(response) {
                if (response.error === 0)
                    window.location.reload();
                else if (response.error === 1)
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
            },
            error: function(error) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    });
</script>

<!-- Change Status -->
<script>
    $('#sel-status<?php echo $uniqid; ?>').on('change', function() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/changeProductStatus'); ?>",
            data: {
                'status': $('#sel-status<?php echo $uniqid; ?>').val(),
                'productID': productID
            },
            dataType: "json",
            success: function(response) {
                if (response.error === 0)
                    simpleAlert('success', 'Estado actualizado', 'center');
                else
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
            },
            error: function(error) {
                simpleAlert('error', 'Ha ocurrido un error!', 'center');
            }
        });
    });
</script>

<!-- Sel Cat -->
<script>
    $('#sel-cat<?php echo $uniqid; ?>').select2({ // Sel Cat 
        placeholder: {
            id: '',
            text: 'Selecciona una Categoría'
        },
    }).on('change', function() {
        catID = $(this).val();
        getSelSubCatsByCat();
        $('.sel-cat<?php echo $uniqid; ?>').removeClass('is-invalid');
        updateCat();
    });
</script>

<!-- Save Product Info -->
<script>
    $('#save-product<?php echo $uniqid; ?>').on('click', function() {
        let requiredValues = checkRequiredValues();
        if (requiredValues == 0) {
            url = "<?php echo base_url("ControlPanel/updateProduct"); ?>";
            msg = "Producto actualizado!";
            $.ajax({
                type: "post",
                url: url,
                data: {
                    'name': $('#txt-name<?php echo $uniqid; ?>').val(),
                    'code': $('#txt-code<?php echo $uniqid; ?>').val(),
                    'catID': catID,
                    'subCatID': subCatID,
                    'cost': $('#txt-cost<?php echo $uniqid; ?>').val(),
                    'price': $('#txt-price<?php echo $uniqid; ?>').val(),
                    'pprice': $('#txt-pprice<?php echo $uniqid; ?>').val(),
                    'stock': $('#txt-stock<?php echo $uniqid; ?>').val(),
                    'desc': $('#txt-description<?php echo $uniqid; ?>').val(),
                    'productID': productID
                },
                dataType: "json",
                success: function(res) {
                    if (res.error == 0) {
                        simpleAlert('success', 'Información del Producto Actualizada!', 'center');
                    } else if (res.error == 1) {
                        if (res.msg == "DUPLICATE_NAME") {
                            simpleAlert('warning', 'Ya existe el producto!', 'center');
                            $('#txt-name<?php echo $uniqid; ?>').addClass('is-invalid');
                        } else if (res.msg == "SESSION_EXPIRED") {
                            window.location.href = "<?php echo base_url('Auth/admin?msg=sessionExpired'); ?>";
                        } else if (res.msg == "DUPLICATE_CODE") {
                            simpleAlert('warning', 'Ya existe un producto con ese código!', 'center');
                            $('#txt-name<?php echo $uniqid; ?>').addClass('is-invalid');
                        }
                    }
                },
                error: function(e) {
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
                }
            });
        } else
            simpleAlert('warning', 'Hay campos requeridos!', 'center');
    });

    function checkRequiredValues() {
        let result = 0;
        let value = "";
        $('.required<?php echo $uniqid; ?>').each(function() {
            value = $(this).val();
            if (value == "") {
                $(this).addClass('is-invalid');
                result = 1;
            }
        });
        return result;
    }
    $('.required<?php echo $uniqid; ?>').on('focus', function() {
        $(this).removeClass('is-invalid');
    });
</script>

<!-- Drop Zone Media -->
<script>
    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: '<?php echo base_url('ControlPanel/uploadProductImgs'); ?>',
        method: 'post',
        acceptedFiles: '.jpg,.png',
        maxFiles: 5,
        addRemoveLinks: true,
        autoProcessQueue: false,
        paramName: 'files',
        uploadMultiple: true,
        init: function() {
            kt_dropzonejs_example_1 = this;
            this.on("sending", function(file, xhr, formData) {
                formData.append("productID", productID);
            });
        }
    });

    $('#upload-<?php echo $uniqid; ?>').on('click', function() {
        if (myDropzone.files.length > 0) {
            myDropzone.processQueue();
            myDropzone.on("complete", function(response) {
                simpleAlert('success', 'Archivos subidos', 'center');
                setTimeout(() => {
                    window.location.reload();
                }, "2000");
            });
        } else
            simpleAlert('warning', 'No hay archivos que subir', 'center');
    });
</script>