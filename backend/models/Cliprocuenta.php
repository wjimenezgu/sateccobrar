<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "CliProCuenta".
 *
 * @property integer $id
 * @property string $cuentaCliente
 * @property string $cuenta
 * @property integer $idBanco
 * @property integer $idMoneda
 * @property integer $idCliPro
 *
 * @property CliPro $idCliPro0
 * @property Banco $idBanco0
 * @property Moneda $idMoneda0
 */
class Cliprocuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CliProCuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuentaCliente', 'cuenta', 'idBanco', 'idMoneda'], 'required'],
            [['idBanco', 'idMoneda', 'idCliPro'], 'integer'],
            [['cuentaCliente', 'cuenta'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuentaCliente' => 'Cuenta Cliente',
            'cuenta' => 'Cuenta',
            'idBanco' => 'Banco',
            'idMoneda' => 'Moneda',
            'idCliPro' => 'Id Cli Pro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliPro0()
    {
        return $this->hasOne(CliPro::className(), ['id' => 'idCliPro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBanco0()
    {
        return $this->hasOne(Banco::className(), ['id' => 'idBanco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMoneda0()
    {
        return $this->hasOne(Moneda::className(), ['id' => 'idMoneda']);
    }
}
