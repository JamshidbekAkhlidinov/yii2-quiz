<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:40:48
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */


use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $model app\modules\admin\forms\ProfileForm
*/

$this->title = translate("Profile");
Yii::$app->params['breadcrumbs'][] = translate("User");
Yii::$app->params['breadcrumbs'][] = $this->title;
?>


<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
        <img src="/images/profile-bg.jpg" alt="" class="profile-wid-img"/>
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
    <div class="row g-4">
        <div class="col-auto">
                <div class="avatar-lg">
                    <img src="<?= user()->identity->userProfile->avatar ?>" alt="user-img" class="img-thumbnail rounded-circle avatar-lg" style="object-fit: cover">
                </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1">
                    <?= user()->identity->publicIdentity ?>
                </h3>
                <p class="text-white text-opacity-75">
                    <?= user()->identity->role() ?>
                </p>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>California,
                        United States
                    </div>
                    <div>
                        <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>Themesbrand
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->


    </div>
    <!--end row-->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="flex-shrink-0" style="text-align: right">
            <a href="<?= Url::to(['/admin/profile/update-data']) ?>" class="btn btn-success">
                <i class="ri-edit-box-line align-bottom"></i><?= translate("Edit Profile") ?></a>
        </div>

        <div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3"><?= translate("Info") ?></h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                            <tr>
                                                <th class="ps-0" scope="row"><?= translate("Full Name") ?> :</th>
                                                <td class="text-muted"><?= user()->identity->publicIdentity ?></td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row"><?= translate("Mobile") ?> :</th>
                                                <td class="text-muted"><?= user()->identity->userProfile->phone_number ?></td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row"><?= translate("E-mail") ?> :</th>
                                                <td class="text-muted"><?= user()->identity->email ?></td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Location :</th>
                                                <td class="text-muted">California, United States
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row"><?= translate("Birthday") ?></th>
                                                <td class="text-muted"><?= user()->identity->userProfile->birthday ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Portfolio</h5>
                                    <div class="d-flex flex-wrap gap-2">
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                                                                        <i class="ri-github-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                                        <i class="ri-global-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-success">
                                                                        <i class="ri-dribbble-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                                        <i class="ri-pinterest-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Skills</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-15">
                                        <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Photoshop</a>
                                        <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">illustrator</a>
                                        <a href="javascript:void(0);"
                                           class="badge bg-primary-subtle text-primary">HTML</a>
                                        <a href="javascript:void(0);"
                                           class="badge bg-primary-subtle text-primary">CSS</a>
                                        <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Javascript</a>
                                        <a href="javascript:void(0);"
                                           class="badge bg-primary-subtle text-primary">Php</a>
                                        <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Python</a>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">About</h5>
                                    <p>Hi I'm<?= user()->identity->publicIdentity ?>, It will be as simple as
                                        Occidental; in fact, it will be Occidental. To an English person, it will seem
                                        like simplified English, as a skeptical Cambridge friend of mine told me what
                                        Occidental is European languages are members of the same family.</p>
                                    <p>You always want to make sure that your fonts work well together and try to limit
                                        the number of fonts you use to three or less. Experiment and play around with
                                        the fonts that you already have in the software you’re working with reputable
                                        font websites. This may be the most commonly encountered tip I received from the
                                        designers I spoke with. They highly encourage that you use different fonts in
                                        one design, but do not over-exaggerate and go overboard.</p>
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-user-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Designation :</p>
                                                    <h6 class="text-truncate mb-0">Lead Designer / Developer</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-global-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Website :</p>
                                                    <a href="#" class="fw-semibold">www.velzon.com</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!-- end card -->


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-0">Suggestions</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink2"
                                                           data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill fs-14"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuLink2">
                                                            <li><a class="dropdown-item" href="#">View</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="/images/users/avatar-3.jpg" alt=""
                                                             class="img-fluid rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Esther James</h5>
                                                            <p class="fs-13 text-muted mb-0">Frontend Developer</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <button type="button" class="btn btn-sm btn-outline-success"><i
                                                                    class="ri-user-add-line align-middle"></i></button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="/images/users/avatar-4.jpg" alt=""
                                                             class="img-fluid rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Jacqueline Steve</h5>
                                                            <p class="fs-13 text-muted mb-0">UI/UX Designer</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <button type="button" class="btn btn-sm btn-outline-success"><i
                                                                    class="ri-user-add-line align-middle"></i></button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="/images/users/avatar-5.jpg" alt=""
                                                             class="img-fluid rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">George Whalen</h5>
                                                            <p class="fs-13 text-muted mb-0">Backend Developer</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <button type="button" class="btn btn-sm btn-outline-success"><i
                                                                    class="ri-user-add-line align-middle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                    <!--end card-->
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-0">Popular Posts</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink1"
                                                           data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill fs-14"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuLink1">
                                                            <li><a class="dropdown-item" href="#">View</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="flex-shrink-0">
                                                    <img src="/images/small/img-4.jpg" alt="" height="50"
                                                         class="rounded"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <a href="javascript:void(0);">
                                                        <h6 class="text-truncate fs-14">Design your apps in your own
                                                            way</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">15 Dec 2021</p>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="flex-shrink-0">
                                                    <img src="/images/small/img-5.jpg" alt="" height="50"
                                                         class="rounded"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <a href="javascript:void(0);">
                                                        <h6 class="text-truncate fs-14">Smartest Applications for
                                                            Business</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">28 Nov 2021</p>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="/images/small/img-6.jpg" alt="" height="50"
                                                         class="rounded"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <a href="javascript:void(0);">
                                                        <h6 class="text-truncate fs-14">How to get creative in your
                                                            work</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">21 Nov 2021</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                            </div>

                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>

            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

