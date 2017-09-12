<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Version;

/**
 * VersionSearch represents the model behind the search form about `common\models\Version`.
 */
class VersionSearch extends Version
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_force_update', 'status'], 'integer'],
            [['current_version', 'url_app', 'message_mm','message_en', 'created_at', 'updated_at'], 'safe'],
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
        $query = Version::find();

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
            'is_force_update' => $this->is_force_update,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'current_version', $this->current_version])
            ->andFilterWhere(['like', 'url_app', $this->url_app])
            ->andFilterWhere(['like', 'message_mm', $this->message_mm])
            ->andFilterWhere(['like', 'message_en', $this->message_en]);

        return $dataProvider;
    }
}
