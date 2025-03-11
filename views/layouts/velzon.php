<?php

/**
 * @var string $content
 * $this View
 */

use app\assets\FrontendAsset;
use app\modules\admin\components\view\LandingElementSelector;
use app\modules\admin\enums\LandingElementEnum;
use app\widgets\LanguageSwitcherWidget;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

FrontendAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$css = <<<CSS
.dropdown-toggle::after {
     content: "" !important; 
}
CSS;
$this->registerCss($css);

$selector = new LandingElementSelector();
$header = $selector->getElement(LandingElementEnum::HEADER);
$this->title = $header->title;
?>
<?php $this->beginPage() ?>
<!doctype html>
<html
        lang="<?= Yii::$app->language ?>"
>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example">
<?php $this->beginBody() ?>
<div class="layout-wrapper landing">
    <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= Url::home() ?>">
                <img src="<?= $header->files ?>" class="card-logo card-logo-dark" alt="logo dark" height="40">
                <img src="/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
            </a>
            <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hero"><?= translate("Home") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services"><?= translate("Services") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features"><?= translate("Features") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#plans"><?= translate("Plans") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews"><?= translate("Reviews") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team"><?= translate("Team") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><?= translate("Contact") ?></a>
                    </li>
                    <li>
                        <?= LanguageSwitcherWidget::widget() ?>
                    </li>
                </ul>

                <div class="">
                    <?php if (user()->isGuest): ?>
                        <a href="<?= Url::to(['site/login']) ?>"
                           class="btn btn-link fw-medium text-decoration-none text-body">Login</a>
                        <a href="<?= Url::to(['site/signup']) ?>" class="btn btn-primary">Sign Up</a>
                    <?php else: ?>

                        <div class="btn-group" role="group">
                            <button
                                    id="btnGroupDrop1"
                                    type="button"
                                    class="btn btn-primary dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                            >
                                [ <?= user()->identity->publicIdentity ?>]
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/admin']) ?>">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['site/logout']) ?>">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>


    <?php if (controller()->route !== 'site/index'): ?>
        <section class="section pb-0 hero-section" id="hero">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <div class="container">
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </section>
    <?php else: ?>
        <?= $content ?>
    <?php endif; ?>

    <!-- Start footer -->
    <footer class="custom-footer bg-dark py-5 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div>
                        <div>
                            <img src="<?= $header->files ?>" alt="logo light" height="17">
                        </div>
                        <div class="mt-4 fs-13">
                            <p><?= $header->title ?></p>
                            <p class="ff-secondary">
                                <?= $header->description ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 ms-lg-auto">
                    <div class="row">
                        <div class="col-sm-4 mt-4">
                            <h5 class="text-white mb-0">Company</h5>
                            <div class="text-muted mt-3">
                                <ul class="list-unstyled ff-secondary footer-list">
                                    <li><a href="pages-profile.html">About Us</a></li>
                                    <li><a href="pages-gallery.html">Gallery</a></li>
                                    <li><a href="apps-projects-overview.html">Projects</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-4">
                            <h5 class="text-white mb-0">Apps Pages</h5>
                            <div class="text-muted mt-3">
                                <ul class="list-unstyled ff-secondary footer-list">
                                    <li><a href="pages-pricing.html">Calendar</a></li>
                                    <li><a href="apps-mailbox.html">Mailbox</a></li>
                                    <li><a href="apps-chat.html">Chat</a></li>
                                    <li><a href="apps-crm-deals.html">Deals</a></li>
                                    <li><a href="apps-tasks-kanban.html">Kanban Board</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-4">
                            <h5 class="text-white mb-0">Support</h5>
                            <div class="text-muted mt-3">
                                <ul class="list-unstyled ff-secondary footer-list">
                                    <li><a href="pages-faqs.html">FAQ</a></li>
                                    <li><a href="pages-faqs.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row text-center text-sm-start align-items-center mt-5">
                <div class="col-sm-6">
                    <div>
                        <p class="copy-rights mb-0">
                            <script> document.write(new Date().getFullYear()) </script>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end mt-3 mt-sm-0">
                        <ul class="list-inline mb-0 footer-social-link">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-facebook-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-github-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-linkedin-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-google-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-dribbble-line"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
</div>
<!-- end footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
