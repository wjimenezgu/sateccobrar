<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PlanesEstudio".
 *
 * @property integer $idInstitucion
 * @property integer $idEscuela
 * @property integer $idCarrera
 * @property integer $idPlanEstudio
 * @property string $nombrePlanEstudio
 * @property string $idInstitucionPlan
 * @property integer $idModalidad
 * @property string $observaciones
 * @property string $fechaAprobacion
 * @property string $numSesionAprobacion
 *
 * @property Modalidad $idModalidad0
 * @property Carreras $idCarrera0
 * @property Escuelas $idEscuela0
 * @property Instituciones $idInstitucion0
 */
class Planesestudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PlanesEstudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela', 'idCarrera', 'nombrePlanEstudio', 'idModalidad'], 'required'],
            [['idInstitucion', 'idEscuela', 'idCarrera', 'idModalidad'], 'integer'],
            [['fechaAprobacion'], 'safe'],
            [['nombrePlanEstudio'], 'string', 'max' => 150],
            [['idInstitucionPlan'], 'string', 'max' => 25],
            [['observaciones'], 'string', 'max' => 300],
            [['numSesionAprobacion'], 'string', 'max' => 35]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Id Institucion',
            'idEscuela' => 'Id Escuela',
            'idCarrera' => 'Id Carrera',
            'idPlanEstudio' => 'Id Plan Estudio',
            'nombrePlanEstudio' => 'Nombre Plan Estudio',
            'idInstitucionPlan' => 'Id Institucion Plan',
            'idModalidad' => 'Id Modalidad',
            'observaciones' => 'Observaciones',
            'fechaAprobacion' => 'Fecha Aprobacion',
            'numSesionAprobacion' => 'Num Sesion Aprobacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModalidad0()
    {
        return $this->hasOne(Modalidad::className(), ['idModalidad' => 'idModalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCarrera0()
    {
        return $this->hasOne(Carreras::className(), ['idCarrera' => 'idCarrera']);
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
    public function getIdInstitucion0()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'idInstitucion']);
    }
}
