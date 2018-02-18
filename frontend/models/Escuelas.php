<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Escuelas".
 *
 * @property integer $idInstitucion
 * @property integer $idEscuela
 * @property string $nombreEscuela
 *
 * @property Instituciones $idInstitucion0
 */
class Escuelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Escuelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'nombreEscuela'], 'required'],
            [['idInstitucion'], 'integer'],
            [['nombreEscuela'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institución',
            'idEscuela' => 'Id Escuela',
            'nombreEscuela' => 'Nombre Escuela',
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
