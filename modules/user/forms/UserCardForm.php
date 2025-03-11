<?php
/*
 *   Jamshidbek Akhlidinov
 *   7 - 8 2024 12:36:11
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\user\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\CardAssigned;
use yii\base\Model;

class UserCardForm extends Model
{
    public $subject_id;

    public function rules()
    {
        return [
            [['subject_id'], 'integer'],
        ];
    }


    public function save()
    {
        $subject_id = $this->subject_id;

        $card = CardAssigned::find()
            ->andWhere(['subject_id' => $subject_id])
            ->andWhere(['status' => StatusEnum::ACTIVE])
            ->orderBy('RAND()')
            ->one();

        if (!$card) {
            return false;
        }

        $card->assign_user_id = user()->id;
        $card->assigned_at = date('Y-m-d H:i:s');

        return $card->save();
    }

    public function attributeLabels()
    {
        return [
            'subject_id' => translate("Subject")
        ];
    }
}