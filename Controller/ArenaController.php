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
        $this->set('raw',$this->Fighter->findById(1));
    }

    public function diary()
    {
        $this->set('raw',$this->Event->find());
    }

    public function login()
    {
        //die('test');
    }

    public function sight()
    {
        if ($this->request->is('post')) {
            pr($this->request->data);
            if (isset($this->request->data['Fightermove']))
            $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);
            if (isset($this->request->data['ChangeLevel']))
            $this->Fighter->changeLevel(1, $this->request->data['ChangeLevel']['level']);
        }

        $this->set('raw',$this->Fighter->find('all'));


    }

}

?>
