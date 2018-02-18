<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vMaestro".
 *
 * @property integer $idMaestro
 * @property string $descripcion
 * @property integer $idCliente
 */
class Vmaestro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vMaestro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idMaestro', 'idCliente'], 'integer'],
            [['descripcion', 'idCliente'], 'required'],
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
}
