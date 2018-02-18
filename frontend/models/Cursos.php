<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cursos".
 *
 * @property integer $idInstitucion
 * @property integer $idEscuela
 * @property integer $idCurso
 * @property string $codigoCurso
 * @property string $nombreCurso
 * @property integer $creditos
 * @property string $horas
 *
 * @property Escuelas $idEscuela0
 * @property Instituciones $idInstitucion0
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cursos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela', 'codigoCurso', 'nombreCurso', 'creditos', 'horas'], 'required'],
            [['idInstitucion', 'idEscuela', 'creditos'], 'integer'],
            [['horas'], 'number'],
            [['codigoCurso'], 'string', 'max' => 10],
            [['nombreCurso'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institucion',
            'idEscuela' => 'Escuela',
            'idCurso' => 'Id Curso',
            'codigoCurso' => 'Código Curso',
            'nombreCurso' => 'Nombre Curso',
            'creditos' => 'Créditos',
            'horas' => 'Horas',
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
    public function getIdInstitucion0()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'idInstitucion']);
    }
}
