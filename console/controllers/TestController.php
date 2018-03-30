<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

/**
 * Test Console Application
 */
class TestController extends Controller
{
    
    public function actionIndex ()
    {
        echo "This is my first console application.";
    }

}

?>