<?php

use yii\helpers\Url;

$facker = \Faker\Factory::create('en');
$text = $facker->text(rand(10000, 30000));
?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title flex-grow-1">Default Badges</h4>
                <p class="text-muted">Use the <code>badge</code> class to set a default badge.</p>
            </div><!-- end card-body -->
        </div>
    </div>
    <div class="col-md-3">

        <div class="live-preview">
            <div class="list-group list-group-fill-success">
                <span class="list-group-item list-group-item-action active">
                    <i class="ri-download-2-fill align-middle me-2"></i>
                    Kategoriyalar
                </span>
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <a href="<?= Url::to(['post/view', 'category' => $i]) ?>"
                       class="list-group-item list-group-item-action <?= ($i == 3) ? 'active2' : '' ?>">
                        <i class="ri-shield-check-line align-middle me-2"></i>
                        Security Access
                    </a>
                <?php endfor; ?>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">
                    Eng mashhur postlar
                </h4>
                <div>
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        View all
                    </button>
                </div>
            </div><!-- end card-header -->

            <div class="card-body">
                <?php for ($i = 1; $i <= 4; $i++):
                    $text = $facker->text(rand(10, 50));
                    ?>
                    <div class="d-flex <?= ($i != 1) ? " mt-4" : "" ?>">
                        <div class="flex-shrink-0">
                            <img src="/images/small/img-2.jpg" class="rounded img-fluid" style="height: 60px;" alt="">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1 lh-base">
                                <a href="<?= Url::to(['post/view', 'id' => $i]) ?>" class="text-reset">
                                    <?= $text ?>
                                </a>
                            </h6>
                            <p class="text-muted fs-12 mb-0">
                                Dec 03, 2021
                                <i class="mdi mdi-circle-medium align-middle mx-1"></i>
                                12:09 PM
                            </p>
                        </div>
                    </div><!-- end -->
                <?php endfor; ?>
            </div><!-- end card body -->
        </div>

        <div class="card card-body">
            <div>
                <?php for ($i = 1; $i <= 4; $i++):
                    $text = $facker->text(rand(10, 15));
                    ?>
                    <a href="<?= Url::to(['post/view', 'id' => $i]) ?>" class="badge bg-success">
                        <?= $text ?>
                    </a>
                <?php endfor; ?>
            </div>
        </div>

    </div>

</div>