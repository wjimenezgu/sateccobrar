<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "EstadoDocumento".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Documento[] $documentos
 */
class Estadodocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EstadoDocumento';
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
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['idEstadoDocumento' => 'id']);
    }
}
