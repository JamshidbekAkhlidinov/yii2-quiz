<?php
/* @var $title string */
/* @var $count int */
?>

<div class="col-xl-2 col-md-3">
    <!-- card -->
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <p class="text-uppercase fw-medium text-muted mb-0">
                        <?= $title ?>
                    </p>
                </div>
            </div>
            <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <span class="counter"><?= $count ?></span> ta</h4>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->
