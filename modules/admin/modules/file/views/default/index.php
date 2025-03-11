<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 2:35:22
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

app()->params['breadcrumbs'][] = translate("File manager")

?>




<div class="file-default-index">
    <?= alexantr\elfinder\ElFinder::widget([
        'connectorRoute' => ['default/connector'],
        'settings' => [
            'height' => 540,
        ],
        'buttonNoConflict' => true,
    ]) ?>
</div>
