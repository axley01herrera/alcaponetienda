<label class="fs-6 fw-semibold" for="sel-subCat<?php echo $uniqid; ?>">Sub Categoría <span class="text-danger">*</span></label>
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
        dropdownParent: $("#modal"),
        placeholder: {
            id: '',
            text: 'Selecciona una Sub Categoría'
        },
    }).on('change', function() {
        subCatID = $(this).val();
        $('.sel-subCat').removeClass('is-invalid');
    });
</script>