<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TipoTelefono".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property EntidadContactoTelefono[] $entidadContactoTelefonos
 * @property EntidadTelefono[] $entidadTelefonos
 */
class Tipotelefono extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoTelefono';
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
    public function getEntidadContactoTelefonos()
    {
        return $this->hasMany(EntidadContactoTelefono::className(), ['idTipoTelefono' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidadTelefonos()
    {
        return $this->hasMany(EntidadTelefono::className(), ['idTipoTelefono' => 'id']);
    }
}
