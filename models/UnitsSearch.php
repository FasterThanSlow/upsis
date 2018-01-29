<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Units;

/**
 * UnitsSearch represents the model behind the search form about `app\models\Units`.
 */
class UnitsSearch extends Units
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'distance', 'localities_id', 'is_field_unit'], 'integer'],
            [['name', 'method_of_calling', 'spec_vehicle'], 'safe'],
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
        $query = Units::find();

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
        
        
        if($params['localities_id']){
            $query->andFilterWhere(['localities_id' => $params['localities_id']]);
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'distance' => $this->distance,
            'localities_id' => $this->localities_id,
            'is_field_unit' => $this->is_field_unit,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'method_of_calling', $this->method_of_calling])
            ->andFilterWhere(['like', 'spec_vehicle', $this->spec_vehicle]);

        return $dataProvider;
    }
}
