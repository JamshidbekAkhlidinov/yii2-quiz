<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:37:42
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\telegram\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TelegramBotUser;

/**
 * TelegramBotUserSearch represents the model behind the search form of `app\models\TelegramBotUser`.
 */
class TelegramBotUserSearch extends TelegramBotUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'telegram_company_id', 'is_admin', 'is_block', 'step'], 'integer'],
            [['telegram_user_id', 'username', 'phone_number', 'full_name', 'options', 'created_at', 'updated_at'], 'safe'],
            [['balance'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TelegramBotUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'telegram_company_id' => $this->telegram_company_id,
            'balance' => $this->balance,
            'is_admin' => $this->is_admin,
            'is_block' => $this->is_block,
            'step' => $this->step,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'telegram_user_id', $this->telegram_user_id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'options', $this->options]);

        return $dataProvider;
    }
}
