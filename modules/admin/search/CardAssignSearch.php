<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 07 2024 10:58:43
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\CardAssign;

/**
 * CardAssignSearch represents the model behind the search form of `app\modules\admin\models\CardAssign`.
 */
class CardAssignSearch extends CardAssign
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'card_data_id', 'card_item_id', 'status', 'assign_user_id'], 'integer'],
            [['assign_at'], 'safe'],
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
        $query = CardAssign::find();

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
            'card_data_id' => $this->card_data_id,
            'card_item_id' => $this->card_item_id,
            'status' => $this->status,
            'assign_at' => $this->assign_at,
            'assign_user_id' => $this->assign_user_id,
        ]);

        return $dataProvider;
    }
}
