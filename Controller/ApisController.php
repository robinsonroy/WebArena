<?php

/**
 * Created by PhpStorm.
 * User: gregoire
 * Date: 11/17/14
 * Time: 4:50 PM
 */
App::uses('AppController', 'Controller');

class ApisController extends AppController {

    public $uses = array('Player', 'Fighter', 'Event','Surrounding');

    public function index() {
        
    }

    public function fighterview($id) {

        $this->layout = 'ajax';
        $this->set('datas', $this->Fighter->findById($id));
    }

    public function fighterdomove($id) {

        $this->layout = 'ajax';
        $decors = $this->Surrounding->find('all');

        if (isset($this->request->params['pass'][0])&&isset($this->request->params['pass'][1])){
            $this->set('test',$this->Fighter->doMove($this->request->params['pass'][0], $this->request->params['pass'][1],$decors));
        }
    }

    public function fighterdoattack($id) {

        $this->layout = 'ajax';


        if (isset($this->request->params['pass'][0])&&isset($this->request->params['pass'][1])){
           $this->set('test', $this->Fighter->doAttack($this->request->params['pass'][0], $this->request->params['pass'][1]));
        }

    }

}
