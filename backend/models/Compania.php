<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Compania".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property CliProCia[] $cliProCias
 * @property Mensajero[] $mensajeros
 * @property Talonario[] $talonarios
 * @property UsuarioCia[] $usuarioCias
 * @property User[] $idusers
 */
class Compania extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Compania';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProCias()
    {
        return $this->hasMany(CliProCia::className(), ['idCompania' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensajeros()
    {
        return $this->hasMany(Mensajero::className(), ['idCompania' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalonarios()
    {
        return $this->hasMany(Talonario::className(), ['idCompania' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioCias()
    {
        return $this->hasMany(UsuarioCia::className(), ['idCompania' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdusers()
    {
        return $this->hasMany(User::className(), ['id' => 'iduser'])->viaTable('UsuarioCia', ['idCompania' => 'id']);
    }
}
