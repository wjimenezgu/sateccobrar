<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Carreras".
 *
 * @property integer $idInstitucion
 * @property integer $idEscuela
 * @property integer $idCarrera
 * @property integer $idGrado
 * @property string $nombreCarrera
 *
 * @property Escuelas $idEscuela0
 * @property GradosAcademicos $idGrado0
 * @property Instituciones $idInstitucion0
 */
class Carreras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Carreras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela', 'idGrado', 'nombreCarrera'], 'required'],
            [['idInstitucion', 'idEscuela', 'idGrado'], 'integer'],
            [['nombreCarrera'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institución',
            'idEscuela' => 'Escuela',
            'idCarrera' => 'Id Carrera',
            'idGrado' => 'Grado',
            'nombreCarrera' => 'Nombre Carrera',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEscuela0()
    {
        return $this->hasOne(Escuelas::className(), ['idEscuela' => 'idEscuela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrado0()
    {
        return $this->hasOne(Gradosacademicos::className(), ['idGrado' => 'idGrado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInstitucion0()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'idInstitucion']);
    }
}
