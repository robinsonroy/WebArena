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
class ArenaController extends AppController {

    public $uses = array('Player', 'Fighter', 'Event');

    /**
     * index method : first page
     *
     * @return void
     */
    public function index() {
        //die('test');
    }

    public function character() {
        $this->set('raw', $this->Fighter->findById(1));
    }

    public function diary() {
        $this->set('raw', $this->Event->find());
    }

    public function login() {
        $this->Player->loginplayer($this->request->data['login']['Login'], $this->request['login']['password']);
    }

    public function sight() {
        if ($this->request->is('post')) {

            $this->Session->setFlash('Une action a été réalisée.');

            pr($this->request->data);
            if (isset($this->request->data['Fightermove']))
                $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);
            if (isset($this->request->data['ChangeLevel']))
                $this->Fighter->changeLevel(1, $this->request->data['ChangeLevel']['level']);
            if (isset($this->request->data['Fighterattack']))
                $this->Fighter->doAttack($this->request->data['Fighterattack']['id'], $this->request->data['Fighterattack']['id2'], $this->request->data['Fighterattack']['direction']);
        }
        $this->set('raw', $this->Fighter->find('all'));
    }

    public function chooseAvatar() {
        //Récupère la liste des fighters, avec les champs id et name
        $fighterList = $this->Fighter->find('all', array('fields' => array('id', 'name')));

        //crée un tableau qui serviras à remplir les options du formulaire de choix de fighter
        $choicelist = array();

        //pour tout les fighters de la bdd
        foreach ($fighterList as $key => $value) {
            //on met dans la liste du choix du formulaire le nom du fighter, avec pour key son id
            $choicelist[$value['Fighter']['id']] = $value['Fighter']['name'];
        }

        //on passe la liste de choix de fighter à la vue
        $this->set('fighterList', $choicelist);

        //si le formulaire a été rempli
        if ($this->request->is('post')) {
            //Récupération du résultat du formulaire
            $fighter_id = $this->request->data['avatar']['fighter_choice'];

            if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {   
                $imageName = "avatar_".$fighter_id.".jpg";
                $this->set('imageName', $imageName);

                //déplacement de l'image d'avatar dans le dossier "webroot/img/uploads/
                //avec le nom avatar_id.jpg
                if (move_uploaded_file(
                                $_FILES['avatar']['tmp_name'],  'img/uploads/avatar_' . $fighter_id . ".jpg"
                        )
                ) {
                    echo "Le transfert s'est bien deroule";
                } else
                    echo "erreur sur le transfert";
            }
        }
    }

    public function createchar() {
        //création
        if ($this->request->is('post')) {
            $data = array(
                'Fighter' => array(
                    'name' => $this->request->data['Createchar']['create_name'],
                    'player_id' => '545f827c-576c-4dc5-ab6d-27c33186dc3e',
                    'coordinate_x' => $this->request->data['Createchar']['create_coordx'],
                    'coordinate_y' => $this->request->data['Createchar']['create_coordy'],
                    'level' => $this->request->data['Createchar']['create_level'],
                    'xp' => $this->request->data['Createchar']['create_xp'],
                    'skill_sight' => $this->request->data['Createchar']['create_skillsight'],
                    'skill_strength' => $this->request->data['Createchar']['create_skillstrength'],
                    'skill_health' => $this->request->data['Createchar']['create_skillhealth'],
                    'current_health' => $this->request->data['Createchar']['create_current_health']));
            $this->Fighter->create();
            if ($this->Fighter->save($data)) {
                return $this->redirect('sight');
            }
            //  $this->Fighter->creation($this->request->data['Createchar']['create_name'],$this->request->data['Createchar']['create_playerid'],$this->request->data['Createchar']['create_coordx'],$this->request->data['Createchar']['create_coordy'],$this->request->data['Createchar']['create_level'],$this->request->data['Createchar']['create_xp'],$this->request->data['Createchar']['create_skillsight'],$this->request->data['Createchar']['create_skillstrenght'],$this->request->data['Createchar']['create_skillhealth'],$this->request->data['Createchar']['create_current_health']);
            // $this->Fighter->deletechar(); Test fonction delete, à refaire
        }
    }

}
