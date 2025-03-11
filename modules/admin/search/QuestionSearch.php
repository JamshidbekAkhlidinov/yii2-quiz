<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Question;

/**
 * QuestionSearch represents the model behind the search form of `app\modules\admin\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'test_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['text', 'created_at', 'updated_at'], 'safe'],
            [['ball'], 'number'],
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
        $query = Question::find();

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
            'test_id' => $this->test_id,
            'status' => $this->status,
            'ball' => $this->ball,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
