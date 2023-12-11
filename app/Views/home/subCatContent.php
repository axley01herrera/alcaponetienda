<div class="row">
    <?php foreach ($products as $p) { ?>
        <?php
        if (empty($p->photo))
            $urlImage = 'background-image: url(' . base_url('public/assets/media/stock/ecommerce/76.png') . ')';
        else
            $urlImage = 'background-image: url(data:image/png;base64,' . base64_encode($p->photo) . ')';
        ?>
        <div class="col-12 col-lg-4 mb-20">
            <a id="product-detail" class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="#">
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="<?php echo $urlImage; ?>"></div>
                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 text-center fs-1 text-white">
                    <?php echo $p->name; ?>
                </div>
            </a>
        </div>
    <?php } ?>
</div>

<script>
    $('#product-detail').on('click', function (e) {
        e.preventDefault();
    });
</script>