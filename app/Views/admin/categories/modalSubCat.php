<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"><?php echo $modalTitle; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Cat -->
                    <div class="col-12 mb-5">
                        <label class="fs-6 fw-semibold" for="sel-cat<?php echo $uniqid; ?>">Categoría <span class="text-danger">*</span></label>
                        <select id="sel-cat<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>">
                            <option value=""></option>
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?php echo $cat->id; ?>" <?php if(!empty($catID)) { if($catID == $cat->id) echo "selected"; } ?>><?php echo $cat->cat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Sub Cat -->
                    <div class="col-12">
                        <label class="fs-6 fw-semibold" for="txt-sub-cat<?php echo $uniqid; ?>">Sub Categoría <span class="text-danger">*</span></label>
                        <input type="text" id="txt-sub-cat<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php echo @$subCat[0]->sub_category; ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="save-subCat<?php echo $uniqid; ?>" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let action = "<?php echo $action; ?>";
        let catID = "<?php echo @$catID; ?>";
        let subCatID = "<?php echo @$subCat[0]->id; ?>";

        $('#sel-cat<?php echo $uniqid; ?>').select2({ // Sel Cat 
            dropdownParent: $("#modal"),
            placeholder: {
                id: '',
                text: 'Selecciona'
            },
        }).on('change', function() {
            catID = $(this).val();
            $('.select2-selection').each(function() {
                $(this).removeClass('is-invalid');
            })
        });

        $('#modal').modal('show');
        $('#modal').on('hidden.bs.modal', function(event) {
            $('#app-modal').html('');
        });

        $('#save-subCat<?php echo $uniqid; ?>').on('click', function() { // Submit SubCat
            let requiredValues = checkRequiredValues();
            if (requiredValues == 0 && catID != "") {
                let subCat = $('#txt-sub-cat<?php echo $uniqid; ?>').val();
                let url = "";
                let msg = "";

                if (action == "create") {
                    url = "<?php echo base_url('ControlPanel/createSubCat'); ?>";
                    msg = "Sub Categoría creada!";
                } else {
                    url = "<?php echo base_url("ControlPanel/updateSubCat"); ?>";
                    msg = "Sub Categoría actualizada!";
                }

                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        'catID': catID,
                        'subCat': subCat,
                        'subCatID': subCatID
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.error == 0) {
                            simpleAlert('success', msg, 'center');
                            setTimeout(() => {
                                window.location.reload();
                            }, "2000");
                        } else if (res.error == 1) {
                            if (res.msg == "DUPLICATE_RECORD") {
                                simpleAlert('warning', 'Ya existe la sub categoría!', 'center');
                                $('#txt-sub-cat<?php echo $uniqid; ?>').addClass('is-invalid');
                            } else if (res.msg == "SESSION_EXPIRED") {
                                window.location.href = "<?php echo base_url('Auth/admin?msg=sessionExpired'); ?>";
                            }
                        }
                    },
                    error: function(e) {
                        simpleAlert('error', 'Ha ocurrido un error!', 'center');
                    }
                });
            } else {
                simpleAlert('warning', 'Hay campos requeridos!', 'center');
                if (catID == "") {
                    $('.select2-selection').each(function() {
                        $(this).addClass('is-invalid');
                    });
                }
            }
        });

        function checkRequiredValues() {
            let result = 0;
            let value = "";
            let inputID = "";

            $('.required<?php echo $uniqid; ?>').each(function() {
                inputID = $(this).attr('id');
                value = $('#' + inputID).val();
                if (value == "") {
                    $('#' + inputID).addClass('is-invalid');
                    result = 1;
                }
            });
            return result;
        }

        $('.required<?php echo $uniqid; ?>').on('focus', function() {
            $(this).removeClass('is-invalid');
        });
    });
</script>