<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 26.01.2019
 * Time: 17:46
 */

namespace app\controllers;

use yii\base\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords' , 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description' , 'content' => "$description"]);
    }
}