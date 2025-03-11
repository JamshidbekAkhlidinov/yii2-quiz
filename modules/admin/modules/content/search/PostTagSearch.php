<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:41:20
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\content\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\modules\content\models\PostTag;

/**
 * PostTagSearch represents the model behind the search form of `app\modules\admin\modules\content\models\PostTag`.
 */
class PostTagSearch extends PostTag
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'deleted_at'], 'safe'],
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
        $query = PostTag::find();

        $query->orderBy([
            'id' => SORT_DESC,
        ]);
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
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
