<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */

/** @var Exception $exception */

use ustadev\widgets\LottiePlayer;
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

    <div class="d-flex justify-content-center">
        <?php
        echo LottiePlayer::widget([
            'src' => 'https://assets7.lottiefiles.com/packages/lf20_tmsiddoc.json',
            'options' => [
                'style' => [
                    'width' => '400px',
                ],
            ]
        ]);
        ?>
    </div>

</div>
