<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:36:02
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\telegram\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TelegramCompany;

/**
 * TelegramCompanySearch represents the model behind the search form of `app\models\TelegramCompany`.
 */
class TelegramCompanySearch extends TelegramCompany
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'bot_token', 'admin_ids', 'admin_url', 'channel_id'], 'safe'],
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
        $query = TelegramCompany::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bot_token', $this->bot_token])
            ->andFilterWhere(['like', 'admin_ids', $this->admin_ids])
            ->andFilterWhere(['like', 'admin_url', $this->admin_url])
            ->andFilterWhere(['like', 'channel_id', $this->channel_id]);

        return $dataProvider;
    }
}
