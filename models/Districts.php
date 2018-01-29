<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property integer $id
 * @property string $name
 * @property integer $regions_id
 *
 * @property Regions $regions
 * @property Localities[] $localities
 * @property MembersOfTheCommission[] $membersOfTheCommissions
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regions_id'], 'required'],
            [['regions_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['regions_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['regions_id' => 'id']],
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
            'regions_id' => 'Идентификатор области',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasOne(Regions::className(), ['id' => 'regions_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalities()
    {
        return $this->hasMany(Localities::className(), ['districts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembersOfTheCommissions()
    {
        return $this->hasMany(MembersOfTheCommission::className(), ['districts_id' => 'id', 'districts_regions_id' => 'regions_id']);
    }
}
