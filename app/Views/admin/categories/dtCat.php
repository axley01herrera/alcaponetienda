<div class="table-responsive">
    <table id="dt-cat" class="table no-footer">
        <thead>
            <tr class="fs-5 fw-bold" style="background-color: #f9f9f9;">
                <th>Categoría</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat) { ?>
                <tr class="fs-7 fw-bold" style="vertical-align: middle;">
                    <td><?php echo $cat->cat; ?></td>
                    <td class="text-end">
                        <a data-cat-id="<?php echo $cat->id; ?>" href="#" class="btn btn-sm btn-light btn-active-color-primary edit-cat" title="Editar Categoría"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        var dtCat = $('#dt-cat').DataTable({ // Data Table
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
                $('#search-cat').html('');
                $('#dt-cat_filter').appendTo('#search-cat');
            }
        }); // ok

        dtCat.on('click', '.edit-cat', function(e) { // Edit Cat
            e.preventDefault();
            let catID = $(this).attr('data-cat-id');
            $.ajax({
                type: "post",
                url: "<?php echo base_url('ControlPanel/modalCat'); ?>",
                data: {
                    'action': "update",
                    'catID': catID
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
    });
</script>