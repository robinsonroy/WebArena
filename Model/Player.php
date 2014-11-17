<?php
/**
 * Created by PhpStorm.
 * User: gregoire
 * Date: 11/11/14
 * Time: 10:08 PM
 */

App::uses('AppModel', 'Model');

class Player extends AppModel
{
    public $displayField = 'name';

    public function loginplayer($login,$pas)
    {
        $result=$this->find('first',array('conditions'=>array('email'=>$login)));
        var_dump($result);
        echo $login;
        var_dump($login);
    }
}