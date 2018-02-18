<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Distritos".
 *
 * @property integer $idProvincia
 * @property integer $idCanton
 * @property integer $idDistrito
 * @property string $nombreDistrito
 *
 * @property Cantones $idProvincia0
 * @property Persona[] $personas
 */
class Distritos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Distritos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProvincia', 'idCanton', 'nombreDistrito'], 'required'],
            [['idProvincia', 'idCanton'], 'integer'],
            [['nombreDistrito'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProvincia' => 'Id Provincia',
            'idCanton' => 'Id Canton',
            'idDistrito' => 'Id Distrito',
            'nombreDistrito' => 'Nombre Distrito',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvincia0()
    {
        return $this->hasOne(Cantones::className(), ['idProvincia' => 'idProvincia', 'idCanton' => 'idCanton']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['idDistrito' => 'idDistrito']);
    }
}
