<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pais".
 *
 * @property integer $id
 * @property string $nombrePais
 *
 * @property Persona[] $personas
 * @property Provincia[] $provincias
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Pais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombrePais'], 'required'],
            [['nombrePais'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombrePais' => 'Nombre Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['idNacionalidad' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(Provincia::className(), ['idPais' => 'id']);
    }
}
