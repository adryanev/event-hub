<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 2/12/2019
 * Time: 12:16 PM
 */

namespace admin\models;


use common\models\OrganizerVerification;
use common\models\StatusKonten;
use common\models\UserOrganizer;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class OrganizerVerificationSearch extends OrganizerVerification
{

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
        $query = UserOrganizer::find();

        // add conditions that should always apply here
        $query->where(['verification_status'=>StatusKonten::ORGANIZER_PENDING, 'isVerified'=>StatusKonten::STATUS_NOT_VERIFIED]);

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
            'isDeleted' => $this->isDeleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

    public function verificationData($id){
        $query = OrganizerVerification::find()->where(['id_organizer'=>$id]);

        $dataProvider = new ActiveDataProvider([
            'query'=>$query
        ]);

        return $dataProvider;
    }
}