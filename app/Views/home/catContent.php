<div class="row">
    <div class="col-12 col-md-3 col-lg-3">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-200px">
            <?php foreach ($subCategories as $index => $sub) { ?>
                <li class="nav-item w-100 me-0 mb-md-2 ">
                    <a data-sub-cat-id="<?php echo $sub->id; ?>" class="sub-tab nav-link w-100 btn btn-flex btn-active-light-primary <?php if ($index == 0) {
                                                                                                                                    echo 'active';
                                                                                                                                    $subCatID = $sub->id;
                                                                                                                                } ?>" data-bs-toggle="tab" href="#">
                        <span class="svg-icon fs-2"><svg>...</svg></span>
                        <span class="d-flex flex-column align-items-start">
                            <span class="fs-7 fw-bold"><?php echo $sub->sub_category; ?></span>
                        </span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-8">
        <div id="subcat-content"></div>
    </div>
</div>

<script>
    var subCatID = "<?php echo $subCatID; ?>";
    getSubCatContent();

    $('.sub-tab').on('click', function() {
        $('.sub-tab').each(function() {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        subCatID = $(this).attr('data-sub-cat-id');
        getSubCatContent();
    });

    function getSubCatContent() {
        console.log('subCatID', subCatID);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Home/getSubCatContent'); ?>",
            data: {
                'subCatID': subCatID,
            },
            dataType: "html",
            success: function(res) {
                $('#subcat-content').html(res);
            },
            error: function(e) {
                simpleAlert('error', 'Ha ocurrido un error');
            }
        });
    }
</script>