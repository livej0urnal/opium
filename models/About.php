<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 05.02.2019
 * Time: 10:45
 */

namespace app\models;

use yii\db\ActiveRecord;

class About extends ActiveRecord
{
    public static function tableName()
    {
        return 'about';
    }
}