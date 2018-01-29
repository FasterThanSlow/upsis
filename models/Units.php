<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "units".
 *
 * @property integer $id
 * @property string $name
 * @property string $method_of_calling
 * @property string $distance
 * @property string $spec_vehicle
 * @property integer $localities_id
 * @property string $is_field_unit
 *
 * @property Localities $localities
 * @property VehicleCalls[] $vehicleCalls
 */
class Units extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'units';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['distance', 'localities_id', 'is_field_unit'], 'integer'],
            [['localities_id'], 'required'],
            [['name', 'method_of_calling', 'spec_vehicle'], 'string', 'max' => 255],
            [['localities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localities::className(), 'targetAttribute' => ['localities_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'method_of_calling' => 'Способ вызова',
            'distance' => 'Расстояние от населенного пункта',
            'spec_vehicle' => 'Специальная техника',
            'localities_id' => 'Localities ID',
            'is_field_unit' => 'Is Field Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalities()
    {
        return $this->hasOne(Localities::className(), ['id' => 'localities_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleCalls()
    {
        return $this->hasMany(VehicleCalls::className(), ['units_id' => 'id']);
    }
}
