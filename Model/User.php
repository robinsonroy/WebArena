<?php
/**
 * Created by PhpStorm.
 * User: gregoire
 * Date: 11/11/14
 * Time: 10:08 PM
 */

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel
{

    public $userTable = 'Player';
    public $name = 'Player';

    public $hasMany= array(
        'Fighter' => array(
            'className' => "Fighter"
        )
    );
    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('email'),
                'message' => 'Une adresse mail est requise'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Un mot de passe est requis'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }




    public function loginplayer($login,$pas)
    {



        $result=$this->find('all',array('conditions'=>array('email'=>$login)));
        pr ($result);
        if ($result == NULL)
        {
            echo "succes";
        }
        else
        {
            echo "Fail";
        }
    }
}