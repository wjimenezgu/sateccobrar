<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Modalidad".
 *
 * @property integer $idInstitucion
 * @property integer $idModalidad
 * @property string $descModalidad
 * @property string $descBloquePlan
 * @property integer $cantMeses
 * @property integer $anioInicioPeriodo
 * @property integer $ultAnioGenPeriodo
 *
 * @property Instituciones $idInstitucion0
 */
class Modalidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Modalidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'descModalidad', 'descBloquePlan'], 'required'],
            [['idInstitucion', 'cantMeses', 'anioInicioPeriodo', 'ultAnioGenPeriodo'], 'integer'],
            [['descModalidad', 'descBloquePlan'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institución',
            'idModalidad' => 'Id Modalidad',
            'descModalidad' => 'Descripción',
            'descBloquePlan' => 'Nombre Bloque',
            'cantMeses' => 'Cantidad Meses',
            'anioInicioPeriodo' => 'Año Primer Periodo',
            'ultAnioGenPeriodo' => 'Ultimo Año Períodos',
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
