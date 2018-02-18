<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Banco".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CliProCuenta[] $cliProCuentas
 */
class Banco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Banco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProCuentas()
    {
        return $this->hasMany(CliProCuenta::className(), ['idBanco' => 'id']);
    }
}
