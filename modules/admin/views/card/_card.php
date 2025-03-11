<?php
/*
 *   Jamshidbek Akhlidinov
 *   7 - 8 2024 13:6:44
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $model \app\modules\admin\models\CardAssigned
 * @var $card \app\modules\admin\models\Card
 */


?>
<h2 class="text-center" style="font-size: 20px"><?= $card->name ?></h2>

<div class="col-md-12 h-100">

    <div class="card card-body">
        <table class="table table-bordered" style="border: 1px solid black;">
            <tr  style="border: 1px solid black;">
                <th  class="text-center" colspan="4"><?=$card->university?></th>
            </tr>
            <tr  style="border: 1px solid black;">
                <td  style="border: 1px solid black;" colspan="2" class="text-center"><?=$card->faculty?></td>
                <td colspan="2" class="">Fakultet</td>
            </tr>
            <tr  style="border: 1px solid black;">
                <td  style="border: 1px solid black;" colspan="2" class="text-center"><?=$card->department?></td>
                <td colspan="2" class="">Kafedra</td>
            </tr>
            <tr  style="border: 1px solid black;">
                <td  style="border: 1px solid black;" colspan="2" class="text-center"><?=$card->education_direction?></td>
                <td colspan="2" class="">Talim yo'nalishi</td>
            </tr>
            <tr  style="border: 1px solid black;">
                <td  style="border: 1px solid black;" colspan="2" class="text-center"><?=$card->specialty?></td>
                <td colspan="2" class="">Mutaxassisligi</td>
            </tr>
            <tr  style="border: 1px solid black;">
                <td  style="border: 1px solid black;" colspan="2" class="text-center"><?=$card->subject->name?></td>
                <td colspan="2" class="">Fani</td>
            </tr>

            <tr  style="border: 1px solid black;">
                <th  style="border: 1px solid black;" class="text-center" colspan="4">
                    <b>Imtixon bileti n-1</b>
                </th>
            </tr>

            <?php
            foreach ($model->cardAssignedItems as $i=>$item) {
                $text = $item->cardData->text;
                ?>
                <tr  style="border: 1px solid black;">
                    <td  style="border: 1px solid black;"><b><?=$i+1?></b></td>
                    <td  style="border: 1px solid black;" colspan="3">
                        <?= $text ?>
                    </td>
                </tr>
                <?php
            }
            ?>

            <tr  style="border: 1px solid black;">
                    <td rowspan="2"  style="border: 1px solid black;text-align: center">Tuzuvchi</td>
                    <td colspan="2"  style="border: 1px solid black;text-align: center">

                    </td>
                    <td  style="border: 1px solid black;text-align: center">
                        <?=$card->creator?>
                    </td>
            </tr>

            <tr  style="border: 1px solid black;">
                <td colspan="2" style="border: 1px solid black;text-align: center">Imzo</td>
                <td style="border: 1px solid black;text-align: center">Fish</td>
            </tr>

            <tr style="border: 1px solid black;">
                <td rowspan="2" style="border: 1px solid black;text-align: center">Kafedra mudiri</td>
                <td colspan="2" style="border: 1px solid black;text-align: center">

                </td>
                <td style="border: 1px solid black;text-align: center">
                    <?=$card->department_head?>
                </td>
            </tr>

            <tr style="border: 1px solid black;">
                <td colspan="2" style="border: 1px solid black;text-align: center">Imzo</td>
                <td style="border: 1px solid black;text-align: center">Fish</td>
            </tr>



        </table>
    </div>

<!--    <div class="card">-->
<!--        <div class="card-header">-->
<!--            <h6 class="card-title mb-0">-->
<!--                --><?php //= translate("CARD ID: {id}", ['id' => $model->id]) ?>
<!--                --><?php //= translate("USER: {username}", ['username' => ($user = $model->assignUser) ? $user->getPublicIdentity() : '']) ?>
<!--            </h6>-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <blockquote class="card-blockquote mb-0">-->
<!--                --><?php
//                foreach ($model->cardAssignedItems as $item) {
//                    $text = $item->cardData->text;
//                    ?>
<!--                    <figure class="mb-0">-->
<!--                        <blockquote class="blockquote">-->
<!--                            --><?php //= $text ?>
<!--                        </blockquote>-->
<!--                    </figure>-->
<!--                    --><?php
//                }
//                ?>
<!--            </blockquote>-->
<!--        </div>-->
<!--    </div>-->
</div>
