<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "i18n_source_message".
 *
 * @property int $id
 * @property string|null $category
 * @property string|null $message
 *
 * @property I18nMessage[] $i18nMessages
 */
class I18nSourceMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'i18n_source_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'category' => translate('Category'),
            'message' => translate('Message'),
        ];
    }

    /**
     * Gets query for [[I18nMessages]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\I18nMessageQuery
     */
    public function getI18nMessages()
    {
        return $this->hasMany(I18nMessage::class, ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\I18nSourceMessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\I18nSourceMessageQuery(get_called_class());
    }
}
