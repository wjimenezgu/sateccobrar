<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "IndReqCor".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property PlanesCursosReqCor[] $planesCursosReqCors
 */
class Indreqcor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'IndReqCor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanesCursosReqCors()
    {
        return $this->hasMany(PlanesCursosReqCor::className(), ['idIndReqCor' => 'id']);
    }
}
