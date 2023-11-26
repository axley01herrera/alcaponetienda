<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"><?php echo $modalTitle; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Cat -->
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6 fw-semibold" for="txt-cat<?php echo $uniqid; ?>">Categoría <span class="text-danger">*</span></label>
                        <input type="text" id="txt-cat<?php echo $uniqid; ?>" class="form-control required<?php echo $uniqid; ?>" value="<?php echo @$cat[0]->cat; ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="save-cat<?php echo $uniqid; ?>" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let action = "<?php echo $action; ?>";
        let catID = "<?php echo @$cat[0]->id; ?>";

        $('#modal').modal('show');
        $('#modal').on('hidden.bs.modal', function(event) {
            $('#app-modal').html('');
        });

        $('#save-cat<?php echo $uniqid; ?>').on('click', function() { // Submit Cat
            let requiredValues = checkRequiredValues();
            if (requiredValues == 0) {
                let cat = $('#txt-cat<?php echo $uniqid; ?>').val();
                let url = "";
                let msg = "";

                if (action == "create") {
                    url = "<?php echo base_url('ControlPanel/createCat'); ?>";
                    msg = "Categoría Creada Satisfactoriamente!";
                } else {
                    url = "<?php echo base_url("ControlPanel/updateCat"); ?>";
                    msg = "Categoría Actualizada Satisfactoriamente!";
                }

                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        'cat': cat,
                        'catID': catID
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
                                simpleAlert('warning', 'Ya existe la categoría!', 'center');
                                $('#txt-cat<?php echo $uniqid; ?>').addClass('is-invalid');
                            } else if (res.msg == "SESSION_EXPIRED") {
                                window.location.href = "<?php echo base_url('Auth/admin?msg=sessionExpired'); ?>";
                            }
                        }
                    },
                    error: function(e) {
                        simpleAlert('error', 'Ha ocurrido un error!', 'center');
                    }
                });
            } else
                simpleAlert('warning', 'Categoría requerida!', 'center');
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
    });
</script>