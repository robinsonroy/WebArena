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
    public $uses = array('Player', 'Fighter', 'Event');

    public function index()
    {



    }

    public function fighterview($id)
    {

        $this->layout='ajax';

        $this->set('datas', $this->Fighter->findById($id));




    }
    public function fighterdomove($id)
    {

        $this->layout='ajax';
        $this->set('datas',$this->Fighter->findById($id));


    }

    public function fighterdoattack($id)
    {

        $this->layout='ajax';
        $this->set('datas',$this->Fighter->findById($id));

    }
}



