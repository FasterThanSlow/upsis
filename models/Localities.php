<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localities".
 *
 * @property integer $id
 * @property string $name
 * @property string $selsovet
 * @property integer $districts_id
 *
 * @property Districts $districts
 * @property NeedALadder[] $needALadders
 * @property Units[] $units
 */
class Localities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['districts_id'], 'required'],
            [['districts_id'], 'integer'],
            [['name', 'selsovet'], 'string', 'max' => 255],
            [['districts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['districts_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'name' => 'Название',
            'selsovet' => 'Сельсовет',
            'districts_id' => 'Идентификатор района',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasOne(Districts::className(), ['id' => 'districts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNeedALadders()
    {
        return $this->hasMany(NeedALadder::className(), ['localities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Units::className(), ['localities_id' => 'id']);
    }
}
