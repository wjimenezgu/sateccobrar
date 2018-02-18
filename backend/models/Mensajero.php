<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Mensajero".
 *
 * @property integer $id
 * @property string $nombreCompleto
 * @property integer $idCompania
 *
 * @property Compania $idCompania0
 * @property Talonario[] $talonarios
 */
class Mensajero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Mensajero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreCompleto', 'idCompania'], 'required'],
            [['idCompania'], 'integer'],
            [['nombreCompleto'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombreCompleto' => 'Nombre Completo',
            'idCompania' => 'Compañía',
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
    public function getTalonarios()
    {
        return $this->hasMany(Talonario::className(), ['idMensajero' => 'id']);
    }
}
