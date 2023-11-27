<div class="table-responsive">
    <table id="dt-subCat" class="table no-footer">
        <thead>
            <tr class="fs-5 fw-bold" style="background-color: #f9f9f9;">
                <th>Sub Categoría</th>
                <th>Categoría</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subCategories as $subCat) { ?>
                <tr class="fs-7" style="vertical-align: middle;">
                    <td><?php echo $subCat->sub_category; ?></td>
                    <td><?php echo getCatByID($subCat->id_cat); ?></td>
                    <td class="text-end">
                        <a data-subCat-id="<?php echo $subCat->id; ?>" data-cat-id="<?php echo $subCat->id_cat; ?>" href="#" class="btn btn-sm btn-light btn-active-color-primary edit-subCat" title="Editar Sub Categoría"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    var dtSubCat = $('#dt-subCat').DataTable({ // Data Table
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
            $('#search-subCat').html('');
            $('#dt-subCat_filter').appendTo('#search-subCat');
        }
    }); // ok

    dtSubCat.on('click', '.edit-subCat', function(e) { // Edit Cat
        e.preventDefault();
        let catID = $(this).attr('data-cat-id');
        let subCatID = $(this).attr('data-subCat-id');
        $.ajax({
            type: "post",
            url: "<?php echo base_url('ControlPanel/modalSubCat'); ?>",
            data: {
                'action': "update",
                'catID': catID,
                'subCatID': subCatID
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