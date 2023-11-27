<table id="dt-group" class="table">
    <?php for ($i = 0; $i < $totalCategory; $i++) { $flag = 0; ?>
        <tr>
            <td class="fs-5 fw-bold" style="background-color: #f9f9f9;">
                <strong><?php echo $dtCategory[$i]->cat; ?></strong>
                <?php for ($f = 0; $f < $totalSubCategory; $f++) { if ($dtCategory[$i]->id == $dtSubCategory[$f]->id_cat) { $flag = 1; ?>
                    <tr class="fs-7" style="vertical-align: middle;">
                        <td><?php echo $dtSubCategory[$f]->sub_category; ?></td>
                    </tr>
                <?php } } if ($flag == 0) { ?>
                    <tr>
                        <td>No existen Sub Categorías</td>
                    </tr>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>