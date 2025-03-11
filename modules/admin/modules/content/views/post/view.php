<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:40:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\StatusEnum;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\Post $model */

$this->title = translate("Post View");
params()['breadcrumbs'][] = ['label' => translate("Posts"), 'url' => ['/admin/content/post']];
params()['breadcrumbs'][] = $this->title;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => translate('Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="container-fluid">
    <div class="post-view card ribbon-box border shadow-none">
        <div class="card-header d-flex justify-content-between" style="padding-top: 35px">
            <div class="ribbon ribbon-primary round-shape"><?= translate('Title') ?></div>
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a(translate('Update'),
                    ['update', 'id' => $model->id],
                    ['class' => 'btn btn-primary m-1']
                ) ?>
                <?= Html::a(
                    translate('Delete'),
                    ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger m-1
                        ',
                        'data' => [
                            'confirm' => translate('Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]
                ) ?>
            </p>
        </div>
        <!--    <div class="card-header">-->
        <!--        --><?php //= DetailView::widget([
        //            'model' => $model,
        //            'attributes' => [
        //                'id',
        //                'title',
        //                [
        //                    'format' => 'raw',
        //                    'attribute' => 'image',
        //                    'value' => static function ($model) {
        //                        return Html::img($model->image, ['width' => '100px']);
        //                    },
        //                ],
        //                'sub_text',
        //                [
        //                    'format' => 'raw',
        //                    'attribute' => 'description',
        //                    'value' => function ($data) {
        //                        return str_replace("<img src=","<img width='600px' height='' src=",$data->description);
        //                    },
        //                ],
        //                [
        //                    'attribute' => 'status',
        //                    'format' => 'raw',
        //                    'value' => static function ($model) {
        //                        return Html::tag(
        //                            'span',
        //                            StatusEnum::ALL[$model->status] ?? "",
        //                            [
        //                                'class' => 'badge ' . StatusEnum::COLORS[$model->status] ?? ""
        //                            ]
        //                        );
        //                    }
        //                ],
        //                'view_count',
        //                'created_at',
        //                'updated_at',
        //                [
        //                    'format' => 'raw',
        //                    'attribute' => 'created_by',
        //                    'value' => static function ($model) {
        //                        if ($user = $model->createdBy) {
        //                            return $user->publicIdentity;
        //                        }
        //                    },
        //                ],
        //                [
        //                    'format' => 'raw',
        //                    'attribute' => 'updated_by',
        //                    'value' => static function ($model) {
        //                        if ($user = $model->updatedBy) {
        //                            return $user->publicIdentity;
        //                        }
        //                    },
        //                ],
        //            ],
        //        ]) ?>
        <!--    </div>-->
    </div>
</div>

<section>
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <div class="card ribbon-box border shadow-none">
                                                   <div class="card-body" style="padding-top: 35px">
                                                       <div class="ribbon ribbon-primary round-shape"><?= translate('Sub title') ?></div>
                                                       <p><?= $model->sub_text ?></p>
                                                   </div>
                                                </div>
                                                <div class="card ribbon-box border shadow-none">
                                                    <div class="card-body" style="padding-top: 35px">
                                                        <div class="ribbon ribbon-primary round-shape"><?= translate('Description') ?></div>
                                                        <p><?= str_replace("<img src=", "<img width='100%' height='' src=", $model->description); ?></p>
                                                    </div>
                                                </div>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium"><?= translate('Create date') ?>
                                                                    :</p>
                                                                <h5 class="fs-15 mb-0"><?= $model->created_at ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium"><?= translate('Update date') ?> :</p>
                                                                <h5 class="fs-15 mb-0"><?= $model->updated_at ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium"><?= translate('Status') ?></p>
                                                                <div><?= Html::tag(
                                                                        'span',
                                                                        StatusEnum::ALL[$model->status] ?? "",
                                                                        [
                                                                            'class' => 'badge  fs-12 ' . StatusEnum::COLORS[$model->status] ?? ""
                                                                        ]
                                                                    ); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium"><?= translate('Publish date') ?> :</p>
                                                                <h5 class="fs-15 mb-0"><?= $model->publish_at ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Comments</h4>
                                            <div class="flex-shrink-0">
                                                <div class="dropdown card-header-dropdown">
                                                    <a class="text-reset dropdown-btn" href="#"
                                                       data-bs-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <span class="text-muted">Recent<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Recent</a>
                                                        <a class="dropdown-item" href="#">Top Rated</a>
                                                        <a class="dropdown-item" href="#">Previous</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-body">

                                            <div data-simplebar style="height: 300px;" class="px-3 mx-n3 mb-2">
                                                <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="/images/users/avatar-8.jpg" alt=""
                                                             class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-13">Joseph Parker <small class="text-muted ms-2">20
                                                                Dec 2021 - 05:47AM</small></h5>
                                                        <p class="text-muted">I am getting message from customers that
                                                            when they place order always get error message .</p>
                                                        <a href="javascript: void(0);"
                                                           class="badge text-muted bg-light"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="/images/users/avatar-10.jpg" alt=""
                                                                     class="avatar-xs rounded-circle"/>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-13">Alexis Clarke <small
                                                                            class="text-muted ms-2">22 Dec 2021 -
                                                                        02:32PM</small></h5>
                                                                <p class="text-muted">Please be sure to check your Spam
                                                                    mailbox to see if your email filters have identified
                                                                    the email from Dell as spam.</p>
                                                                <a href="javascript: void(0);"
                                                                   class="badge text-muted bg-light"><i
                                                                            class="mdi mdi-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="/images/users/avatar-6.jpg" alt=""
                                                             class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-13">Donald Palmer <small class="text-muted ms-2">24
                                                                Dec 2021 - 05:20PM</small></h5>
                                                        <p class="text-muted">If you have further questions, please
                                                            contact Customer Support from the “Action Menu” on your <a
                                                                    href="javascript:void(0);"
                                                                    class="text-decoration-underline">Online Order
                                                                Support</a>.</p>
                                                        <a href="javascript: void(0);"
                                                           class="badge text-muted bg-light"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="/images/users/avatar-10.jpg" alt=""
                                                             class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-13">Alexis Clarke <small class="text-muted ms-2">26
                                                                min ago</small></h5>
                                                        <p class="text-muted">Your <a href="javascript:void(0)"
                                                                                      class="text-decoration-underline">Online
                                                                Order Support</a> provides you with the most current
                                                            status of your order. To help manage your order refer to the
                                                            “Action Menu” to initiate return, contact Customer Support
                                                            and more.</p>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col-lg-1 col-sm-2 col-6">
                                                                <img src="/images/small/img-4.jpg" alt=""
                                                                     class="img-fluid rounded">
                                                            </div>
                                                            <div class="col-lg-1 col-sm-2 col-6">
                                                                <img src="/images/small/img-5.jpg" alt=""
                                                                     class="img-fluid rounded">
                                                            </div>
                                                        </div>
                                                        <a href="javascript: void(0);"
                                                           class="badge text-muted bg-light"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="/images/users/avatar-6.jpg" alt=""
                                                                     class="avatar-xs rounded-circle"/>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-13">Donald Palmer <small
                                                                            class="text-muted ms-2">8 sec ago</small>
                                                                </h5>
                                                                <p class="text-muted">Other shipping methods are
                                                                    available at checkout if you want your purchase
                                                                    delivered faster.</p>
                                                                <a href="javascript: void(0);"
                                                                   class="badge text-muted bg-light"><i
                                                                            class="mdi mdi-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="mt-4">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="exampleFormControlTextarea1"
                                                               class="form-label text-body">Leave a Comments</label>
                                                        <textarea class="form-control bg-light border-light"
                                                                  id="exampleFormControlTextarea1" rows="3"
                                                                  placeholder="Enter your comment..."></textarea>
                                                    </div>
                                                    <div class="col-12 text-end">
                                                        <button type="button"
                                                                class="btn btn-ghost-secondary btn-icon waves-effect me-1">
                                                            <i class="ri-attachment-line fs-16"></i></button>
                                                        <a href="javascript:void(0);" class="btn btn-success">Post
                                                            Comments</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- ene col -->
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4"><?= translate('Categories') ?></h5>
                                            <ul style="display: flex;flex-wrap: wrap; padding-left: 0" class="fs-16">
                                                <?php $items = [] ?>
                                                <?php foreach ($model->postCategoryLinkers as $linker) { ?>
                                                    <li class="badge fw-medium bg-secondary-subtle text-secondary m-1"><?= $items[] = $linker->postCategory->name ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4"><?= translate('Taglar') ?></h5>
                                            <ul style="display: flex;flex-wrap: wrap; padding-left: 0" class="fs-16">
                                                <?php $items = [] ?>
                                                <?php foreach ($model->postTagLinkers as $linker) { ?>
                                                    <li class="badge fw-medium bg-secondary-subtle text-secondary m-1"><?= $items[] = $linker->tag->name ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab pane -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>
                    © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end main content-->
</section>
