<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Maestro".
 *
 * @property integer $idMaestro
 * @property string $descripcion
 * @property integer $idCliente
 *
 * @property Detalle[] $detalles
 * @property Detalle[] $detalles0
 * @property CliProCia $idCliente0
 */
class Maestro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Maestro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'idCliente'], 'required'],
            [['idCliente'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMaestro' => 'Id Maestro',
            'descripcion' => 'Descripcion',
            'idCliente' => 'Id Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalles()
    {
        return $this->hasMany(Detalle::className(), ['idMaestro' => 'idMaestro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalles0()
    {
        return $this->hasMany(Detalle::className(), ['idAplica' => 'idMaestro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(CliProCia::className(), ['id' => 'idCliente']);
    }
}
