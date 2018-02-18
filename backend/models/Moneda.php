<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Moneda".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $siglas
 *
 * @property CliProCuenta[] $cliProCuentas
 * @property Documento[] $documentos
 */
class Moneda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Moneda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'siglas'], 'required'],
            [['descripcion'], 'string', 'max' => 100],
            [['siglas'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
            'siglas' => 'Siglas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProCuentas()
    {
        return $this->hasMany(CliProCuenta::className(), ['idMoneda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['idMoneda' => 'id']);
    }
}
