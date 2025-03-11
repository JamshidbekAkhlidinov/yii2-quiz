<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:39:28
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\content\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\modules\content\models\Post;

/**
 * PostSearch represents the model behind the search form of `app\modules\admin\modules\content\models\Post`.
 */
class PostSearch extends Post
{
    public $tag;
    public $category;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'view_count', 'created_by', 'updated_by'], 'integer'],
            [['title', 'image', 'sub_text', 'description', 'created_at', 'updated_at'], 'safe'],
            [['tag', 'category'], 'safe'],
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
        $query = Post::find();

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
            'view_count' => $this->view_count,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'sub_text', $this->sub_text])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
