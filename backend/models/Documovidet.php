<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "DocuMoviDet".
 *
 * @property integer $id
 * @property string $monto
 * @property string $fecIns
 * @property string $userIns
 * @property integer $idDocMaestro
 * @property integer $idDocAplica
 *
 * @property Documento $idDocMaestro0
 * @property Documento $idDocAplica0
 */
class Documovidet extends \yii\db\ActiveRecord
{
	public $saldo;
	public $numDocMaestro;
	public $numDocAplica;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DocuMoviDet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto', 'idDocAplica'], 'required'],
            [['monto'], 'number'],
            [['fecIns','numDocMaestro','numDocAplica','saldo'], 'safe'],
            [['idDocMaestro', 'idDocAplica'], 'integer'],
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
            'monto' => 'Monto Aplica',
            'fecIns' => 'Fecha Aplica',
            'userIns' => 'Usuario',
            'idDocMaestro' => 'Id Doc Maestro',
            'idDocAplica' => 'Documento Aplica',
        	'numDocMaestro'=> 'Doc. Maestro',
        	'numDocAplica' => 'Doc. Aplica',
        	'saldo' =>'Saldo',
        	
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocMaestro0()
    {
        return $this->hasOne(Documento::className(), ['id' => 'idDocMaestro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocAplica0()
    {
        return $this->hasOne(Documento::className(), ['id' => 'idDocAplica']);
    }
    
    public function getSaldo()
    {
    	return '0.00';
    }
    		
    
    
    
 }
    
    
