<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TramitePagCob".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CliProTramPagCob[] $cliProTramPagCobs
 */
class Tramitepagcob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TramitePagCob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProTramPagCobs()
    {
        return $this->hasMany(CliProTramPagCob::className(), ['idTramitePagCob' => 'id']);
    }
}
