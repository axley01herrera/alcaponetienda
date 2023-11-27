<label class="fs-6 fw-semibold" for="sel-subCat<?php echo $uniqid; ?>">Sub Categoría <span class="text-danger">*</span></label>
<select id="sel-subCat<?php echo $uniqid; ?>" class="form-control">
    <option value=""></option>
    <?php foreach ($subCats as $subCat) { ?>
        <option value="<?php echo $subCat->id; ?>"><?php echo $subCat->sub_category; ?></option>
    <?php } ?>
</select>

<script>
    $(document).ready(function() {
        $('#sel-subCat<?php echo $uniqid; ?>').select2({ // Sel Cat 
            dropdownParent: $("#modal"),
            placeholder: {
                id: '',
                text: 'Selecciona una Sub Categoría'
            },
        })
    });
</script>