<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EstadoCivil".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class Estadocivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EstadoCivil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45]
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
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['idEstadoCivil' => 'id']);
    }
}
