<div class="card mb-5 mb-xl-8">
    <div id="company-info" class="card-body">
        <div class="row">
            <?php foreach ($products as $p) { ?>
                <?php
                if (empty($p->photo))
                    $urlImage = base_url('public/assets/media/stock/ecommerce/76.png');
                else
                    $urlImage = 'data:image/png;base64,' . base64_encode($p->photo);
                ?>
                <div class="col-12 col-md-6 col-lg-4 mb-20">
                    <div class="card-body hover-elevate-up d-flex flex-column flex-center" style="height: 300px;">
                        <div class="mb-2">
                            <div class="py-10 text-center">
                                <img src="<?php echo $urlImage; ?>" class="theme-light-show w-200px" alt="">
                            </div>
                        </div>
                        <div class="text-center h-100px">
                            <span class="card-label fw-bold text-dark"><?php echo $p->name; ?></span>
                        </div>
                        <div class="text-center mt-10">
                            <a class="btn btn-sm btn-light-primary" href="">Ver Producto</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>