<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Talonario".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $numeroInicial
 * @property string $numeroFinal
 * @property integer $idCompania
 * @property integer $idMensajero
 * @property integer $idEstadoTalonario
 *
 * @property Compania $idCompania0
 * @property Mensajero $idMensajero0
 * @property EstadoTalonario $idEstadoTalonario0
 */
class Talonario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Talonario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'numeroInicial', 'numeroFinal', 'idCompania', 'idMensajero', 'idEstadoTalonario'], 'required'],
            [['numeroInicial', 'idMensajero', 'idEstadoTalonario'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['numeroFinal'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        	'idCompania' => 'Compañía',
            'descripcion' => 'Descripción',
            'numeroInicial' => 'Número Inicial',
            'numeroFinal' => 'Número Final',
            'idMensajero' => 'Mensajero',
            'idEstadoTalonario' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompania0()
    {
        return $this->hasOne(Compania::className(), ['id' => 'idCompania']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMensajero0()
    {
        return $this->hasOne(Mensajero::className(), ['id' => 'idMensajero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoTalonario0()
    {
        return $this->hasOne(EstadoTalonario::className(), ['id' => 'idEstadoTalonario']);
    }
}
