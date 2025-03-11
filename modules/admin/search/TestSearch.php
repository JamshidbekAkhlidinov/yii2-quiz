<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\search;

use app\modules\admin\enums\UserRolesEnum;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Test;

/**
 * TestSearch represents the model behind the search form of `app\modules\admin\models\Test`.
 */
class TestSearch extends Test
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'created_at', 'updated_at'], 'safe'],
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
        $query = Test::find();
        if(can(UserRolesEnum::ROLE_MANAGER)){
            $query->andWhere(['created_by'=>user()->getId()]);
        }
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
            'subject_id' => $this->subject_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
