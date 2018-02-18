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
class Documento extends \yii\db\ActiveRecord
{
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
            [['idTipoDocumento', 'numero', 'fecha', 'monto', 'idCliProCia'], 'required'],
            [['idTipoDocumento', 'idEstadoDocumento', 'idCliProCia', 'idMoneda'], 'integer'],
            [['fecha', 'fecIns', 'fecVence', 'fecMod','idEstadoDocumento','idMoneda'], 'safe'],
            [['monto', 'saldo'], 'number'],
            [['numero'], 'string', 'max' => 45],
            [['observacion'], 'string', 'max' => 200],
            [['userIns', 'userMod'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTipoDocumento' => 'Tipo Documento',
            'numero' => 'Número',
            'fecha' => 'Fecha',
            'monto' => 'Monto',
            'idEstadoDocumento' => 'Estado',
            'observacion' => 'Observación',
            'fecIns' => 'Fec Ins',
            'userIns' => 'User Ins',
            'saldo' => 'Saldo',
            'idCliProCia' => 'Cliente',
            'idMoneda' => 'Moneda',
            'fecVence' => 'Vence',
            'fecMod' => 'Fecha Modifica',
            'userMod' => 'Usuario Modifica',
        	'antiguedad' => 'Antigüedad',
        	'saldoGrid' => 'Saldo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuAsocis()
    {
        return $this->hasMany(Docuasoci::className(), ['idDocumento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuMoviDets()
    {
        return $this->hasMany(Documovidet::className(), ['idDocMaestro' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuMoviDets0()
    {
        return $this->hasMany(Documovidet::className(), ['idDocAplica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliProCia0()
    {
        return $this->hasOne(Cliprocia::className(), ['id' => 'idCliProCia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoDocumento0()
    {
        return $this->hasOne(Estadodocumento::className(), ['id' => 'idEstadoDocumento']);
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
        return $this->hasOne(Tipodocumento::className(), ['id' => 'idTipoDocumento']);
    }
    
    public function getAntiguedad()
    {
    	
    	$dStart = date_create();
    	$dEnd   	= date_create($this->fecVence);
    	$interval = $dStart->diff($dEnd);
    	if ($dStart > $dEnd){
    		return  $interval->days;
    	}else{
    		return  $interval->days*-1;
    	}    	
    }
    
    public function getCampoLista()
    {
    	return $this->numero.' '.$this->antiguedad.' '.number_format($this->saldo, 2, '.', ',');
    }
    
    public function getSaldoGrid()
    {
    	if ($this->idTipoDocumento0->idDebiCredi == 2){
    		return $this->saldo * -1;
    	}else{
    		return $this->saldo;
    	}
    		
    }
    

}
