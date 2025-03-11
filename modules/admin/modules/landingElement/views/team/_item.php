<?php

use app\modules\admin\modules\landingElement\components\buttons\TeamButtons;
use yii\bootstrap5\Html;

/**
 * @var $model app\modules\admin\modules\landingElement\models\LandingElement
 */

?>

<div class="col">
    <div class="card team-box">
        <div class="team-cover"><img src="<?= $model->icon ?>" alt="" class="img-fluid"></div>
        <div class="card-body p-4">
            <div class="row align-items-center team-row">
                <div class="col team-settings">
                    <div class="row">
                        <div class="col">
                            <div class="flex-shrink-0 me-2">
                                <button type="button"
                                        class="btn btn-light btn-icon rounded-circle btn-sm favourite-btn ">
                                    <i class="ri-star-fill fs-14"></i></button>
                            </div>
                        </div>
                        <div class="col text-end dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill fs-17"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <?= Html::a(
                                        icon('ri-pencil', ['icon' => 'ri']) . " Update",
                                        ['team/update', 'id' => $model->id],
                                        [
                                            'class' => 'dropdown-item edit-list',
                                            'id' => 'update-team-button',
                                        ]
                                    ) ?>
                                </li>
                                <li>
                                    <?= Html::a(
                                        icon('fa-trash', ['icon' => 'fa']) . translate(" Delete"),
                                        ['team/delete', 'id' => $model->id],
                                        [
                                            'class' => 'dropdown-item edit-list',
                                            'id' => 'update-team-button',
                                        ]
                                    ) ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col">
                    <div class="team-profile-img">
                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                            <?php
                            echo Html::img($model->files,
                                [
                                    'class' => 'member-img img-fluid d-block rounded-circle',
                                    'style' => [
                                        'object-fit' => 'cover',
                                        'height' => "100%",
                                        'width' => "100%",
                                    ]
                                ]);
                            ?>
                        </div>
                        <div class="team-content">
                            <?= Html::a(
                                "<h5>" . $model->title . "</h5>",
                                ['team/update', 'id' => $model->id],
                                [
                                    'class' => 'member-name fs-16 mb-1',
                                    'id' => 'update-team-button',
                                ]
                            ) ?>
                            <p class="text-muted member-designation mb-0"><?= $model->description ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col">
                    <div class="row text-muted text-center">

                        <div class="col-6 border-end border-end-dashed">
                            <h5 class="mb-1 projects-num">225</h5>
                            <p class="text-muted mb-0">Projects</p>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-1 tasks-num">197</h5>
                            <p class="text-muted mb-0">Tasks</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col">
                    <div class="text-end">
                        <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
