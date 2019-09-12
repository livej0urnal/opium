<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 05.02.2019
 * Time: 12:35
 */

namespace app\models;

use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }

    public function getArticles()
    {
        return $this->hasOne(Articles::className() , ['articleid' => 'id']);
    }
}