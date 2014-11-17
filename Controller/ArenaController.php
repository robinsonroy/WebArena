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
    
     public function chooseAvatar()
    {
        $fighterList = $this->Fighter->find('all', array('fields' => array('id', 'name')));
        
        $choicelist=array();
        foreach( $fighterList as $key => $value)
        {
           $choicelist[$value['Fighter']['id']] = $value['Fighter']['name'];
        }
        $this->set('fighterList', $choicelist);
        $this->render('/Arena/fighter_choice');
        
        if($this->request->is('post'))
        {
            $fighter_id = $this->request->data['Fighterchoice']['fighter_choice']; 
            $this->set('id',$fighter_id);
            
            $this->render();
            
            if (is_uploaded_file($_FILES['avatar']['tmp_name']))
            {
                $imageName = $_FILES['avatar']['name'];
                $this->set('imageName',$imageName);
                
                
                if(move_uploaded_file(
                    $_FILES['avatar']['tmp_name'],
                     WWW_ROOT .'img\\uploads\\avatar_'.$fighter_id.".jpg"
                ))
                {
                    echo "Le transfert s'est bien deroule";       
                }
                else 
                    echo "erreur sur le transfert";

                // store the filename in the array to be saved to the db
            }
        }   
    }
}

?>
