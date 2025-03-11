<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 05 2024 12:30:39
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\search;

use app\modules\admin\models\I18nSourceMessage;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * I18nSourceMessageSearch represents the model behind the search form of `app\modules\admin\models\I18nSourceMessage`.
 */
class I18nSourceMessageSearch extends I18nSourceMessage
{
    public $languages;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'message', 'languages'], 'safe'],
            [['category', 'message', 'languages'], 'trim'],
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
        $query = I18nSourceMessage::find()
            ->joinWith('i18nMessages', false)
            ->distinct();
        $query->orderBy(['i18n_source_message.id' => SORT_DESC]);

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
            'i18n_source_message.id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'i18n_source_message.category', $this->category])
            ->andFilterWhere(['like', 'i18n_source_message.message', $this->message]);

        $query->andFilterWhere(['like', 'i18n_message.translation', $this->languages]);

        return $dataProvider;
    }
}
