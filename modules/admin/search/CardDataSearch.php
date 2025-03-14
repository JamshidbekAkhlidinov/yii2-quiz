<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 07 2024 10:57:13
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\search;

use app\modules\admin\enums\UserRolesEnum;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\CardData;

/**
 * CardDataSearch represents the model behind the search form of `app\modules\admin\models\CardData`.
 */
class CardDataSearch extends CardData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'type', 'created_by', 'updated_by'], 'integer'],
            [['text', 'created_at', 'updated_at'], 'safe'],
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
        $query = CardData::find();
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
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
