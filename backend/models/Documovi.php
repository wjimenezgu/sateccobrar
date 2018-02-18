<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "DocuMovi".
 *
 * @property integer $idDocumento
 *
 * @property Documento $idDocumento0
 * @property DocuMoviDet[] $docuMoviDets
 */
class Documovi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DocuMovi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDocumento'], 'required'],
            [['idDocumento'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDocumento' => 'Id Documento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocumento0()
    {
        return $this->hasOne(Documento::className(), ['id' => 'idDocumento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuMoviDets()
    {
        return $this->hasMany(Documovidet::className(), ['idDocMaestro' => 'idDocumento']);
    }
}
