<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "EstadoTalonario".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $siglas
 *
 * @property Talonario[] $talonarios
 */
class Estadotalonario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EstadoTalonario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'siglas'], 'required'],
            [['descripcion'], 'string', 'max' => 100],
            [['siglas'], 'string', 'max' => 25]
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
    public function getTalonarios()
    {
        return $this->hasMany(Talonario::className(), ['idEstadoTalonario' => 'id']);
    }
}
