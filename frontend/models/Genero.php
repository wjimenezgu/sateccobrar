<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Genero".
 *
 * @property integer $idGenero
 * @property string $descGenero
 * @property string $letra
 *
 * @property Persona[] $personas
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Genero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descGenero', 'letra'], 'required'],
            [['descGenero'], 'string', 'max' => 45],
            [['letra'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idGenero' => 'Id Genero',
            'descGenero' => 'Desc Genero',
            'letra' => 'Letra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['idGenero' => 'idGenero']);
    }
}
