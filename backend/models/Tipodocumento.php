<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TipoDocumento".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $siglas
 * @property integer $idDebiCredi
 *
 * @property Documento[] $documentos
 * @property DebiCredi $idDebiCredi0
 */
class Tipodocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoDocumento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'siglas', 'idDebiCredi'], 'required'],
            [['idDebiCredi'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['siglas'], 'string', 'max' => 10]
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
            'siglas' => 'Siglas',
            'idDebiCredi' => 'Débito/Crédito',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['idTipoDocumento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDebiCredi0()
    {
        return $this->hasOne(Debicredi::className(), ['id' => 'idDebiCredi']);
    }
}
