<?php
/**
 * Created by PhpStorm.
 * User: Robinson
 * Date: 07/11/14
 * Time: 17:47
 */
    App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ArenaController extends AppController
{
    public $uses = array('Player', 'Fighter', 'Event');
    /**
     * index method : first page
     *
     * @return void
     */
    public function index()
    {
        //die('test');
    }

    public function character()
    {
        //die('test');
    }

    public function diary()
    {
        $this->set('raw', $this->Event->find());
        //die('test');
    }

    public function login()
    {
        //die('test');
    }

    public function sight()
    {
        if($this->request->is('post'))
        {
            pr($this->request->data);
            $this->Fighter->doMove(1,$this->request->data['Fightermove']['direction']);
        }
        
        $this->set('raw', $this->Fighter->find('all'));
    }
}

?>