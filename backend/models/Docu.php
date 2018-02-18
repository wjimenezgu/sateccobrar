<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Documento".
 *
 * @property integer $id
 * @property integer $idTipoDocumento
 * @property string $numero
 * @property string $fecha
 * @property string $monto
 * @property integer $idEstadoDocumento
 * @property string $observacion
 * @property string $fecIns
 * @property string $userIns
 * @property string $saldo
 * @property integer $idCliProCia
 * @property integer $idMoneda
 * @property string $fecVence
 * @property string $fecMod
 * @property string $userMod
 *
 * @property DocuAsoci[] $docuAsocis
 * @property DocuMoviDet[] $docuMoviDets
 * @property DocuMoviDet[] $docuMoviDets0
 * @property CliProCia $idCliProCia0
 * @property EstadoDocumento $idEstadoDocumento0
 * @property Moneda $idMoneda0
 * @property TipoDocumento $idTipoDocumento0
 */
class Docu extends \yii\db\ActiveRecord
{
	public $montoAplica;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoDocumento', 'numero', 'fecha', 'monto', 'idEstadoDocumento', 'userIns', 'idCliProCia', 'idMoneda', 'fecVence'], 'required'],
            [['idTipoDocumento', 'idEstadoDocumento', 'idCliProCia', 'idMoneda'], 'integer'],
            [['fecha', 'fecIns', 'fecVence', 'fecMod','montoAplica'], 'safe'],
            [['monto', 'saldo','montoAplica'], 'number'],
            [['numero'], 'string', 'max' => 45],
            [['observacion'], 'string', 'max' => 200],
            [['userIns', 'userMod'], 'string', 'max' => 50],
        	[['saldo'], 'compare', 'compareAttribute' => 'montoAplica','operator' => '>=']
        		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTipoDocumento' => 'Id Tipo Documento',
            'numero' => 'Numero',
            'fecha' => 'Fecha',
            'monto' => 'Monto',
            'idEstadoDocumento' => 'Id Estado Documento',
            'observacion' => 'Observacion',
            'fecIns' => 'Fec Ins',
            'userIns' => 'User Ins',
            'saldo' => 'Saldo',
            'idCliProCia' => 'Id Cli Pro Cia',
            'idMoneda' => 'Id Moneda',
            'fecVence' => 'Fec Vence',
            'fecMod' => 'Fec Mod',
            'userMod' => 'User Mod',
        	'montoAplica' => "Monto Aplica",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuAsocis()
    {
        return $this->hasMany(DocuAsoci::className(), ['idDocumento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuMoviDets()
    {
        return $this->hasMany(DocuMoviDet::className(), ['idDocMaestro' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuMoviDets0()
    {
        return $this->hasMany(DocuMoviDet::className(), ['idDocAplica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliProCia0()
    {
        return $this->hasOne(CliProCia::className(), ['id' => 'idCliProCia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoDocumento0()
    {
        return $this->hasOne(EstadoDocumento::className(), ['id' => 'idEstadoDocumento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMoneda0()
    {
        return $this->hasOne(Moneda::className(), ['id' => 'idMoneda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoDocumento0()
    {
        return $this->hasOne(TipoDocumento::className(), ['id' => 'idTipoDocumento']);
    }
    
    public function getMontoAplica()
    {
    	return "0.00";
    }

}
