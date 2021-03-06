<?php

namespace admin\models;

use common\models\StatusKonten;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Topic;

/**
 * TopicSearch represents the model behind the search form of `common\models\Topic`.
 */
class TopicSearch extends Topic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['topic_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Topic::find();

        // add conditions that should always apply here

        $query->where(['isDeleted'=>StatusKonten::STATUS_ACTIVE]);
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isDeleted' => $this->isDeleted,
        ]);

        $query->andFilterWhere(['like', 'topic_name', $this->topic_name]);

        return $dataProvider;
    }
}
