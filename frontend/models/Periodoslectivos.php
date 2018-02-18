<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PeriodosLectivos".
 *
 * @property integer $idModalidad
 * @property string $idPeriodoLectivo
 * @property string $fecIniPeriodoNatu
 * @property string $fecFinPeriodoNatu
 * @property string $fechaInicioPeriodo
 * @property string $fechaFinPeriodo
 *
 * @property Modalidad $idModalidad0
 */
class Periodoslectivos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PeriodosLectivos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idModalidad', 'idPeriodoLectivo', 'fecIniPeriodoNatu', 'fecFinPeriodoNatu', 'fechaInicioPeriodo', 'fechaFinPeriodo'], 'required'],
            [['idModalidad'], 'integer'],
        	[['fecIniPeriodoNatu'], 'date', 'format'=>'yyyy/m/d'],
        	[['fecFinPeriodoNatu'], 'date', 'format'=>'d/m/yyyy'],
        	[['fechaInicioPeriodo'], 'date', 'format'=>'d/m/yyyy'],
        	[['fechaFinPeriodo'], 'date', 'format'=>'d/m/yyyy'],           
            [['idPeriodoLectivo'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idModalidad' => 'Modalidad',
            'idPeriodoLectivo' => 'Id Período Lectivo',
            'fecIniPeriodoNatu' => 'Fecha Inicia Natural',
            'fecFinPeriodoNatu' => 'Fecha Finaliza Natural',
            'fechaInicioPeriodo' => 'Fecha Inicia Institución',
            'fechaFinPeriodo' => 'Fecha Finaliza Institución',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModalidad0()
    {
        return $this->hasOne(Modalidad::className(), ['idModalidad' => 'idModalidad']);
    }
    
    
}
