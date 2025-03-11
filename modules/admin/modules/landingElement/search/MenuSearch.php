<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\landingElement\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\modules\landingElement\models\Menu;

/**
 * MenuSearch represents the model behind the search form of `app\modules\admin\modules\landingElement\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order', 'status', 'parent_id', 'type', 'position_menu', 'label_position'], 'integer'],
            [['name', 'icon', 'created_at', 'updated_at', 'slug','item'], 'safe'],
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
        $query = Menu::find();

        if ($this->position_menu) {
            $query->andWhere(['position_menu' => $this->position_menu]);
        }

        $query->orderBy([
            'created_at' => SORT_DESC,
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
            'order' => $this->order,
            'status' => $this->status,
            'parent_id' => $this->parent_id,
            'type' => $this->type,
            'item' => $this->item,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'label_position' => $this->label_position,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
