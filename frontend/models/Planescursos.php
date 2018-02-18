<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PlanesCursos".
 *
 * @property integer $idInstitucion
 * @property integer $idEscuela
 * @property integer $idCarrera
 * @property integer $idPlanEstudio
 * @property integer $idCurso
 * @property string $codigoCursoPlan
 * @property string $nombreCursoPlan
 * @property integer $nivel
 * @property integer $posOrden
 *
 * @property PlanesEstudio $idPlanEstudio0
 * @property Cursos $idCurso0
 * @property Carreras $idCarrera0
 * @property Escuelas $idEscuela0
 * @property Instituciones $idInstitucion0
 * @property PlanesCursosReqCor $planesCursosReqCor
 * @property PlanesCursosReqCor[] $planesCursosReqCors
 */
class Planescursos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PlanesCursos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela', 'idCarrera', 'idPlanEstudio', 'idCurso', 'nivel', 'posOrden'], 'required'],
            [['idInstitucion', 'idEscuela', 'idCarrera', 'idPlanEstudio', 'idCurso', 'nivel', 'posOrden'], 'integer'],
            [['codigoCursoPlan'], 'string', 'max' => 10],
            [['nombreCursoPlan'], 'string', 'max' => 100]
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
            'idCurso' => 'Id Curso',
            'codigoCursoPlan' => 'Codigo Curso Plan',
            'nombreCursoPlan' => 'Nombre Curso Plan',
            'nivel' => 'Nivel',
            'posOrden' => 'Pos Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlanEstudio0()
    {
        return $this->hasOne(PlanesEstudio::className(), ['idPlanEstudio' => 'idPlanEstudio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso0()
    {
        return $this->hasOne(Cursos::className(), ['idCurso' => 'idCurso']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanesCursosReqCor()
    {
        return $this->hasOne(PlanesCursosReqCor::className(), ['idPlanEstudio' => 'idPlanEstudio', 'idCurso' => 'idCurso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanesCursosReqCors()
    {
        return $this->hasMany(PlanesCursosReqCor::className(), ['idPlanEstudioReqCor' => 'idPlanEstudio', 'idCursoReqCor' => 'idCurso']);
    }
}
