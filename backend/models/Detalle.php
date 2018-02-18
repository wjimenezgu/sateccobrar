<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Detalle".
 *
 * @property integer $idDetalle
 * @property integer $idMaestro
 * @property integer $idAplica
 * @property string $monto
 * @property string $fecAplica
 * @property string $observacion
 *
 * @property Maestro $idMaestro0
 * @property Maestro $idAplica0
 */
class Detalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idMaestro', 'idAplica', 'monto', 'fecAplica'], 'required'],
            [['idMaestro', 'idAplica'], 'integer'],
            [['monto'], 'number'],
            [['fecAplica'], 'safe'],
            [['observacion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDetalle' => 'Id Detalle',
            'idMaestro' => 'Id Maestro',
            'idAplica' => 'Id Aplica',
            'monto' => 'Monto',
            'fecAplica' => 'Fec Aplica',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaestro0()
    {
        return $this->hasOne(Maestro::className(), ['idMaestro' => 'idMaestro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAplica0()
    {
        return $this->hasOne(Maestro::className(), ['idMaestro' => 'idAplica']);
    }
}
