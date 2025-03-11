<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 17:44:32
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $locale
 * @property string $firstname
 * @property string $lastname
 * @property string $picture
 * @property string $avatar
 * @property string $phone_number
 * @property string $birthday
 * @property string $avatar_path
 * @property string $avatar_base_url
 * @property integer $gender
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['gender'], 'in', 'range' => [NULL, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['firstname', 'lastname', 'avatar_path', 'avatar_base_url', 'phone_number', 'birthday'], 'string', 'max' => 255],
            //['locale', 'default', 'value' => Yii::$app->language],
            //['locale', 'in', 'range' => array_keys(array_column(Yii::$app->params['availableLocales'],'label','key'))],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => translate('User'),
            'firstname' => translate('Firstname'),
            'lastname' => translate('Lastname'),
            'locale' => translate('Locale'),
            'picture' => translate('Picture'),
            'gender' => translate('Gender'),
            'phone_number' => translate('Phone number'),
            'birthday' => translate('Birthday'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return null|string
     */
    public function getFullName()
    {
        if ($this->firstname || $this->lastname) {
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        return $this->user->username;
    }

    /**
     * @param null $default
     * @return bool|null|string
     */
//    public function getAvatar($default = null)
//    {
//        return $this->avatar_path
//            ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
//            : $default;
//    }

    public function getAvatar()
    {
        if ($photo = $this->avatar_path) {
            return $photo;
        }
        return Yii::getAlias("@web/images/avatar.jpg");
    }
}
