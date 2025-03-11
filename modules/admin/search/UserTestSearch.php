<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:23:19
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\search;

use app\modules\admin\enums\UserRolesEnum;
use app\modules\admin\models\Subject;
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
        if (can(UserRolesEnum::ROLE_MANAGER)) {
            $subject = Subject::find()->andWhere(['created_by' => user()->getId()])->asArray()->all();
            $query->andWhere(['subject_id' => array_column($subject, 'id')]);
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
