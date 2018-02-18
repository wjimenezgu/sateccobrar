<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Persona".
 *
 * @property integer $idPersona
 * @property string $NumeroIdentificacion
 * @property string $nombre
 * @property string $primerApellido
 * @property string $segundoApellido
 * @property string $fecNacimiento
 * @property integer $idNacionalidad
 * @property integer $idEstadoCivil
 * @property integer $idDistrito
 * @property string $otrasSenas
 * @property integer $idGenero
 *
 * @property Pais $idNacionalidad0
 * @property EstadoCivil $idEstadoCivil0
 * @property Distritos $idDistrito0
 * @property Genero $idGenero0
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NumeroIdentificacion', 'nombre', 'primerApellido', 'fecNacimiento', 'idNacionalidad', 'idEstadoCivil', 'idDistrito', 'otrasSenas', 'idGenero'], 'required'],
            [['fecNacimiento'], 'safe'],
            [['idNacionalidad', 'idEstadoCivil', 'idDistrito', 'idGenero'], 'integer'],
            [['NumeroIdentificacion'], 'string', 'max' => 25],
            [['nombre'], 'string', 'max' => 75],
            [['primerApellido', 'segundoApellido'], 'string', 'max' => 50],
            [['otrasSenas'], 'string', 'max' => 150],
            [['NumeroIdentificacion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'NumeroIdentificacion' => 'Numero Identificacion',
            'nombre' => 'Nombre',
            'primerApellido' => 'Primer Apellido',
            'segundoApellido' => 'Segundo Apellido',
            'fecNacimiento' => 'Fec Nacimiento',
            'idNacionalidad' => 'Id Nacionalidad',
            'idEstadoCivil' => 'Id Estado Civil',
            'idDistrito' => 'Id Distrito',
            'otrasSenas' => 'Otras Senas',
            'idGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNacionalidad0()
    {
        return $this->hasOne(Pais::className(), ['id' => 'idNacionalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoCivil0()
    {
        return $this->hasOne(EstadoCivil::className(), ['id' => 'idEstadoCivil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDistrito0()
    {
        return $this->hasOne(Distritos::className(), ['idDistrito' => 'idDistrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGenero0()
    {
        return $this->hasOne(Genero::className(), ['idGenero' => 'idGenero']);
    }
}
