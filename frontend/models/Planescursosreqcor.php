<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PlanesCursosReqCor".
 *
 * @property integer $idInstitucion
 * @property integer $idEscuela
 * @property integer $idCarrera
 * @property integer $idPlanEstudio
 * @property integer $idCurso
 * @property integer $idCursoReqCor
 * @property integer $idIndReqCor
 *
 * @property PlanesCursos $idPlanEstudio0
 * @property PlanesCursos $idCursoReqCor0
 * @property Instituciones $idInstitucion0
 * @property Escuelas $idEscuela0
 * @property Carreras $idCarrera0
 * @property IndReqCor $idIndReqCor0
 */
class Planescursosreqcor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PlanesCursosReqCor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela', 'idCarrera', 'idPlanEstudio', 'idCurso'], 'required'],
            [['idInstitucion', 'idEscuela', 'idCarrera', 'idPlanEstudio', 'idCurso', 'idCursoReqCor', 'idIndReqCor'], 'integer']
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
            'idCursoReqCor' => 'Id Curso Req Cor',
            'idIndReqCor' => 'Id Ind Req Cor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlanEstudio0()
    {
        return $this->hasOne(PlanesCursos::className(), ['idPlanEstudio' => 'idPlanEstudio', 'idCurso' => 'idCurso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCursoReqCor0()
    {
        return $this->hasOne(PlanesCursos::className(), ['idCurso' => 'idCursoReqCor']);
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
    public function getIdEscuela0()
    {
        return $this->hasOne(Escuelas::className(), ['idEscuela' => 'idEscuela']);
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
    public function getIdIndReqCor0()
    {
        return $this->hasOne(IndReqCor::className(), ['id' => 'idIndReqCor']);
    }
}
