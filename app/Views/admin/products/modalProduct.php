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
                                <option value="<?php echo $cat->id; ?>" <?php if (!empty($catID)) {
                                                                            if ($catID == $cat->id) echo "selected";
                                                                        } ?>><?php echo $cat->cat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="subCats" class="col-12 mb-5"></div>
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
    $(document).ready(function() {
        let action = "<?php echo $action; ?>";
        let catID = "<?php echo @$catID; ?>";
        let subCatID = "<?php echo @$subCatID; ?>";

        $('#modal').modal('show');
        $('#modal').on('hidden.bs.modal', function(event) {
            $('#app-modal').html('');
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
        });

        function getSelSubCatsByCat() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('ControlPanel/getSelSubCatsByCat'); ?>",
                data: {
                    'catID': catID
                },
                dataType: "html",
                success: function (res) {
                    $('#subCats').html(res);
                },
                error: function (e) {
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
                }
            });
        }
    });
</script>