<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "DebiCredi".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $factor
 * @property string $simbolo
 *
 * @property TipoDocumento[] $tipoDocumentos
 */
class Debicredi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DebiCredi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'factor', 'simbolo'], 'required'],
            [['factor'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['simbolo'], 'string', 'max' => 10]
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
            'factor' => 'Factor',
            'simbolo' => 'Simbolo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumentos()
    {
        return $this->hasMany(TipoDocumento::className(), ['idDebiCredi' => 'id']);
    }
}
