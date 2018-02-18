<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "DocuAsoci".
 *
 * @property integer $id
 * @property string $numero
 * @property integer $idDocumento
 * @property integer $idTipoDocumento
 * @property string $monto
 * @property string $observacion
 * @property string $fecIns
 * @property string $userIns
 *
 * @property Documento $idDocumento0
 * @property TipoDocumento $idTipoDocumento0
 */
class Docuasoci extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DocuAsoci';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'idTipoDocumento'], 'required'],
            [['idDocumento', 'idTipoDocumento'], 'integer'],
            [['monto'], 'number'],
            [['fecIns','monto'], 'safe'],
            [['numero', 'userIns'], 'string', 'max' => 50],
            [['observacion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Número',
            'idDocumento' => 'Id Documento',
            'idTipoDocumento' => 'Tipo Documento',
            'monto' => 'Monto',
            'observacion' => 'Observación',
            'fecIns' => 'Fec Ins',
            'userIns' => 'User Ins',
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
    public function getIdTipoDocumento0()
    {
        return $this->hasOne(TipoDocumento::className(), ['id' => 'idTipoDocumento']);
    }
}
