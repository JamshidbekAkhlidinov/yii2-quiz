<?php
/*
 *   Jamshidbek Akhlidinov
 *   21 - 11 2023 15:4:46
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

/**
 * @var $content
 * @var $this yii\web\View
 */

use app\modules\admin\assets\AdminAsset;
use app\modules\admin\widgets\LanguageSwitcherWidget;
use yii\bootstrap5\Alert;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

AdminAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => app()->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= app()->language ?>"
      data-layout="horizontal"
      data-topbar="light"
      data-sidebar="dark"
      data-sidebar-size="lg"
      data-sidebar-image="none"
      data-preloader="disable"
>

<head>
    <meta charset="utf-8"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<style>
    .active2 {
        z-index: 1;
        color: #212529;
        text-decoration: none;
        background-color: #eff2f7;
    }
</style>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo" style="display: flex !important;justify-content: space-between">
                        <a href="/" class="logo logo-dark">
                            <span class="logo-lg" style="display: block !important; font-size: 30px; padding-right: 20px">
                               LMS
                            </span>
                        </a>
                        <a href="<?=Url::to(['/site/about'])?>" class="logo logo-dark">
                            <span class="logo-lg" style="display: block !important;">
                               <?=translate("About")?>
                            </span>
                        </a>

                    </div>

                </div>

                <div class="d-flex align-items-center">

                    <?= LanguageSwitcherWidget::widget() ?>

                    <?php if (!user()->isGuest): ?>
                        <div class="dropdown ms-1 topbar-head-dropdown header-item">
                            <button type="button" class="btn"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="<?= user()->identity->userProfile->getAvatar() ?>"
                                     alt="Header Language" height="40">
                                [<?= user()->identity->publicIdentity ?>]
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">

                                <a href="" class="dropdown-item notify-item">
                                    <span class="align-middle">My results</span>
                                </a>

                                <a href="<?= Url::to(['/site/logout']) ?>" class="dropdown-item notify-item">
                                    <span class="align-middle">Chiqish</span>
                                </a>

                            </div>
                        </div>

                    <?php endif; ?>


                </div>
            </div>
        </div>
    </header>


    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content" style="margin-top:20px !important;">
            <div class="container-fluid">

                <?php if (session()->hasFlash('alert')) : ?>
                    <?php echo Alert::widget([
                        'body' => ArrayHelper::getValue(
                            session()->getFlash('alert'),
                            'body'
                        ),
                        'options' => ArrayHelper::getValue(
                            session()->getFlash('alert'),
                            'options'
                        ),
                    ]) ?>
                <?php endif; ?>
                <?= $content ?>
                <!-- end page title -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


