<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Aulas".
 *
 * @property integer $idInstitucion
 * @property integer $idSede
 * @property integer $idAula
 * @property string $descripcion
 * @property integer $capacidad
 * @property integer $idTipoAula
 * @property string $localizacion
 *
 * @property Sedes $idSede0
 * @property TipoAula $idTipoAula0
 * @property Instituciones $idInstitucion0
 */
class Aulas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Aulas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idSede', 'descripcion', 'idTipoAula'], 'required'],
            [['idInstitucion', 'idSede', 'capacidad', 'idTipoAula'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['localizacion'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institución',
            'idSede' => 'Sede',
            'idAula' => 'Id Aula',
            'descripcion' => 'Descripción',
            'capacidad' => 'Capacidad',
            'idTipoAula' => 'Tipo Aula',
            'localizacion' => 'Localización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSede0()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'idSede']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoAula0()
    {
        return $this->hasOne(TipoAula::className(), ['idTipoAula' => 'idTipoAula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInstitucion0()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'idInstitucion']);
    }
}
