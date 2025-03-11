<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:24:21
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\user\search;

use app\modules\admin\models\UserTest;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserTestSearch represents the model behind the search form of `app\modules\admin\models\UserTest`.
 */
class UserTestSearch extends UserTest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'subject_id', 'test_id', 'selected_test_id', 'total_count', 'solve_count', 'status'], 'integer'],
            [['total_ball', 'solve_ball'], 'number'],
            [['created_at', 'expired_at'], 'safe'],
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
        $query = UserTest::find();
        $query->andWhere([
            'user_id' => user()->id,
        ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => SORT_DESC,
            ]
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
            'user_id' => $this->user_id,
            'subject_id' => $this->subject_id,
            'test_id' => $this->test_id,
            'selected_test_id' => $this->selected_test_id,
            'total_ball' => $this->total_ball,
            'solve_ball' => $this->solve_ball,
            'total_count' => $this->total_count,
            'solve_count' => $this->solve_count,
            'created_at' => $this->created_at,
            'expired_at' => $this->expired_at,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
