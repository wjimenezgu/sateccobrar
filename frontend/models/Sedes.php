<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Sedes".
 *
 * @property integer $idInstitucion
 * @property integer $id
 * @property string $nombreSede
 *
 * @property Instituciones $idInstitucion0
 */
class Sedes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Sedes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'nombreSede'], 'required'],
            [['idInstitucion'], 'integer'],
            [['nombreSede'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institución',
            'id' => 'Id Sede',
            'nombreSede' => 'Nombre Sede',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInstitucion0()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'idInstitucion']);
    }
}
