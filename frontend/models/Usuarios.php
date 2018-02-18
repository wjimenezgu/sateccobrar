<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuarios".
 *
 * @property integer $idUsuario
 * @property string $nombreCompleto
 * @property string $idAcceso
 * @property string $claveAcceso
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreCompleto', 'idAcceso', 'claveAcceso'], 'required'],
            [['nombreCompleto'], 'string', 'max' => 150],
            [['idAcceso'], 'string', 'max' => 25],
            [['claveAcceso'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nombreCompleto' => 'Nombre Completo',
            'idAcceso' => 'Usuario',
            'claveAcceso' => 'Clave',
        ];
    }
}
