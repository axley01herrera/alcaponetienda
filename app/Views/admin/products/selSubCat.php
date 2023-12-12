<?php if ($dropdownParent == 1) { ?>
    <label class="fs-6 fw-semibold" for="sel-subCat<?php echo $uniqid; ?>">Sub Categoría <span class="text-danger">*</span></label>
<?php } ?>
<select id="sel-subCat<?php echo $uniqid; ?>" class="form-control sel-subCat">
    <option value=""></option>
    <?php foreach ($subCats as $subCat) { ?>
        <option value="<?php echo $subCat->id; ?>" <?php if (!empty($subCatID)) {
                                                        if ($subCatID == $subCat->id) echo "selected";
                                                    } ?>><?php echo $subCat->sub_category; ?></option>
    <?php } ?>
</select>

<script>
    $('#sel-subCat<?php echo $uniqid; ?>').select2({ // Sel Cat 
        <?php if ($dropdownParent == 1) { ?>
            dropdownParent: $("#modal"),
        <?php } ?>
        placeholder: {
            id: '',
            text: 'Selecciona una Sub Categoría'
        },
    }).on('change', function() {
        subCatID = $(this).val();
        $('.sel-subCat').removeClass('is-invalid');
        <?php if (empty($dropdownParent)) { ?>
            updatesubCat();
        <?php } ?>
    });
</script>
<?php if (empty($dropdownParent)) { ?>
    <script>
        function updatesubCat() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('ControlPanel/productUpdateSubCat'); ?>",
                data: {
                    'subCatID': $('#sel-subCat<?php echo $uniqid; ?>').val(),
                    'productID': productID
                },
                dataType: "json",
                success: function(response) {
                    if (response.error === 0)
                        simpleAlert('success', 'Sub Categoría actualizada', 'center');
                    else
                        simpleAlert('error', 'Ha ocurrido un error!', 'center');
                },
                error: function(error) {
                    simpleAlert('error', 'Ha ocurrido un error!', 'center');
                }
            });
        }
    </script>
<?php } ?>