<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TipoEntidad".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Entidad[] $entidads
 */
class Tipoentidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoEntidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
    public function getEntidads()
    {
        return $this->hasMany(Entidad::className(), ['idTipoEntidad' => 'id']);
    }
}
