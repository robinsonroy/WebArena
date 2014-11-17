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

    $this->Player->loginplayer($this->request->data['login']['Login'],$this->request['login']['password']);
    }

















    public function sight()
    {
<<<<<<< HEAD


        if ($this->request->is('post'))
        {            pr($this->request->data);        }


         $this->set('raw',$this->Fighter->find('all'));
         $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);

         $this->Fighter->doAttack($this->request->data['Fighterattack']['id'],$this->request->data['Fighterattack']['id2'],$this->request->data['Fighterattack']['direction']);

=======
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
>>>>>>> e19297bb4339db851a7c0ad7e7cef6899fb35aaa
    }































        public function createchar()
    {
        //création
        if ($this->request->is('post'))
        {
        $data = array(
            'Fighter' => array(
                'name' => $this->request->data['Createchar']['create_name'],
                'player_id'    => '545f827c-576c-4dc5-ab6d-27c33186dc3e',
                'coordinate_x'=> $this->request->data['Createchar']['create_coordx'],
                'coordinate_y'=> $this->request->data['Createchar']['create_coordy'],
                'level'=> $this->request->data['Createchar']['create_level'],
                'xp'=>$this->request->data['Createchar']['create_xp'],
                'skill_sight'=>$this->request->data['Createchar']['create_skillsight'],
                'skill_strength'=>$this->request->data['Createchar']['create_skillstrength'],
                'skill_health'=> $this->request->data['Createchar']['create_skillhealth'],
                'current_health'=>$this->request->data['Createchar']['create_current_health'] ) );

        $this->Fighter->create();



       if( $this->Fighter->save($data))
            { return $this->redirect('sight');
            }

      //  $this->Fighter->creation($this->request->data['Createchar']['create_name'],$this->request->data['Createchar']['create_playerid'],$this->request->data['Createchar']['create_coordx'],$this->request->data['Createchar']['create_coordy'],$this->request->data['Createchar']['create_level'],$this->request->data['Createchar']['create_xp'],$this->request->data['Createchar']['create_skillsight'],$this->request->data['Createchar']['create_skillstrenght'],$this->request->data['Createchar']['create_skillhealth'],$this->request->data['Createchar']['create_current_health']);



      // $this->Fighter->deletechar(); Test fonction delete, à refaire


        }





}

<<<<<<< HEAD





}
?>
=======
?>
>>>>>>> e19297bb4339db851a7c0ad7e7cef6899fb35aaa
