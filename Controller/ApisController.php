<?php
/**
 * Created by PhpStorm.
 * User: gregoire
 * Date: 11/17/14
 * Time: 4:50 PM
 */
App::uses('AppController', 'Controller');

class ApisController extends AppController
{

    public function index()
    {



    }

    public function fighterview($id)
    {

        $this->layout='ajax';

        $this->set('datas', $this->Fighter->find('all'));




    }
    public function fighterdomove()
    {
        $this->layout='ajax';
        $this->set('datas',$this->Fighter->find('all'));


    }

    public function fighterdoattack()
    {

        $this->layout='ajax';
        $this->set('datas',$this->Fighter->find('all'));

    }
}



