<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"><?php echo $modalTitle; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Dropzone -->
                <div class="dropzone mb-5" id="kt_dropzonejs_example_1">
                    <div class="dz-message needsclick">
                        <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                        <div class="ms-4">
                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Photo del Producto</h3>
                            <span class="fs-7 fw-semibold text-gray-500">Sube una photo de tu producto!</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Name -->
                    <div class="col-12 col-lg-6 mb-5">
                        <label class="fs-6 fw-semibold" for="txt-name<?php echo $uniqid; ?>">Name <span class="text-danger">*</span></label>
                        <input type="text" id="txt-name<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php echo @strtoupper($product[0]->name); ?>">
                    </div>
                    <!-- Code -->
                    <div class="col-12 col-lg-6 mb-5">
                        <label class="fs-6 fw-semibold" for="txt-code<?php echo $uniqid; ?>">Código <span class="text-danger">*</span></label>
                        <input type="text" id="txt-code<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php echo @$product[0]->code; ?>">
                    </div>
                    <!-- Cat -->
                    <div class="col-12 col-lg-6 mb-5">
                        <label class="fs-6 fw-semibold" for="sel-cat<?php echo $uniqid; ?>">Categoría <span class="text-danger">*</span></label>
                        <select id="sel-cat<?php echo $uniqid; ?>" class="form-control sel-cat<?php echo $uniqid; ?>">
                            <option value=""></option>
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?php echo $cat->id; ?>" <?php if (!empty($catID)) {
                                                                            if ($catID == $cat->id) echo "selected";
                                                                        } ?>><?php echo $cat->cat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Main Sel Sub Cats -->
                    <div id="subCats" class="col-12 col-lg-6 mb-5"></div>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="save-product<?php echo $uniqid; ?>" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var action = "<?php echo $action; ?>";
    var catID = "<?php echo @$catID; ?>";
    var subCatID = "<?php echo @$subCatID; ?>";
    var productID = "";

    if (catID != "")
        getSelSubCatsByCat();

    $('#modal').modal('show');
    $('#modal').on('hidden.bs.modal', function(event) {
        $('#app-modal').html('');
    });

    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: '<?php echo base_url('ControlPanel/uploadProductImg'); ?>',
        method: 'post',
        acceptedFiles: '.jpg,.png',
        maxFiles: 1,
        addRemoveLinks: true,
        autoProcessQueue: false,
        paramName: 'files',
        init: function() {
            kt_dropzonejs_example_1 = this;
            this.on("sending", function(file, xhr, formData) {
                formData.append("productID", productID);
            });
        }
    });

    $('#sel-cat<?php echo $uniqid; ?>').select2({ // Sel Cat 
        dropdownParent: $("#modal"),
        placeholder: {
            id: '',
            text: 'Selecciona una Categoría'
        },
    }).on('change', function() {
        catID = $(this).val();
        getSelSubCatsByCat();
        $('.sel-cat<?php echo $uniqid; ?>').removeClass('is-invalid');
    });

    function getSelSubCatsByCat() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/getSelSubCatsByCat'); ?>",
            data: {
                'catID': catID,
                'subCatID': subCatID,
                'dropdownParent': 1
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

    $('#save-product<?php echo $uniqid; ?>').on('click', function() {
        let requiredValues = checkRequiredValues();

        if (requiredValues == 0 && catID != "" && subCatID != "") {
            let url = "";
            let msg = "";

            if (action == "create") {
                url = "<?php echo base_url('ControlPanel/createProduct'); ?>";
                msg = "Producto creado!";
            } else {
                url = "<?php echo base_url("ControlPanel/updateProduct"); ?>";
                msg = "Producto actualizado!";
                productID = "<?php echo @$product[0]->id; ?>";
            }

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
                    'productID': "<?php echo @$product[0]->id; ?>"
                },
                dataType: "json",
                success: function(res) {
                    if (res.error == 0) {
                        if (productID == "")
                            productID = res.id;
                        uploadPhoto(msg);
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

        } else {
            simpleAlert('warning', 'Hay campos requeridos!', 'center');

            if (catID == "")
                $('.sel-cat<?php echo $uniqid; ?>').addClass('is-invalid');

            if (subCatID == "")
                $('.sel-subCat').addClass('is-invalid');
        }
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

    function uploadPhoto(msg) {
        if (myDropzone.files.length > 0) {
            myDropzone.processQueue();
            myDropzone.on("complete", function(response) {
                simpleAlert('success', msg, 'center');
                setTimeout(() => {
                    window.location.reload();
                }, "2000");
            });
        } else {
            simpleAlert('success', msg, 'center');
            setTimeout(() => {
                window.location.reload();
            }, "2000");
        }
    }
</script>