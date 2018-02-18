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
 *
 * @property DocuMoviDet[] $docuMoviDets
 * @property CliProCia $idCliProCia0
 * @property EstadoDocumento $idEstadoDocumento0
 * @property Moneda $idMoneda0
 * @property TipoDocumento $idTipoDocumento0
 */
class Movimientos extends \yii\db\ActiveRecord
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
            [['idTipoDocumento', 'numero', 'fecha', 'monto', 'idEstadoDocumento', 'idCliProCia', 'idMoneda'], 'required'],
            [['idTipoDocumento', 'idEstadoDocumento', 'idCliProCia', 'idMoneda'], 'integer'],
            [['fecha', 'fecIns'], 'safe'],
            [['monto', 'saldo'], 'number'],
            [['numero'], 'string', 'max' => 45],
            [['observacion'], 'string', 'max' => 200],
            [['userIns'], 'string', 'max' => 50]
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
        ];
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
    
    
    /**
     *
     *  Es una funcion adicional para traer si es debicredi el documento
     *  de la tabla DebiCredi
     */
    public function getDebiCrediDoc() {
    	return $this->idTipoDocumento0->idDebiCredi;
    }
}
