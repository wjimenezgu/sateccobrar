<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Puesto".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property EntidadContacto[] $entidadContactos
 */
class Puesto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Puesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidadContactos()
    {
        return $this->hasMany(EntidadContacto::className(), ['idPuesto' => 'id']);
    }
}
