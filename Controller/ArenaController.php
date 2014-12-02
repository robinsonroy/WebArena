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
    public $uses = array('Player', 'Fighter', 'Event', 'Tool', 'Surrounding', 'Message');
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
// On recherche que les personnages qui ont un ID commun avec les USER pour les afficher.
        $this->set('fighters', $this->Fighter->find('all', array('conditions' => array('Fighter.player_id' => $this->Session->read("Auth.User.id")))));
        $user_fighter = $this->Fighter->find('all', array('conditions' => array('Fighter.player_id' => $this->Session->read("Auth.User.id"))));
        $this->set('fighter', $user_fighter);
        if (!empty($user_fighter)) {
//Recherche du level
            $level_possible = $this->Fighter->determinerNiveau($user_fighter[0]['Fighter']);
            $this->set('choix_level', $level_possible);
            $this->set('imageName', $this->Fighter->chercherAvatar($user_fighter[0]['Fighter']['id']));
        }
        if ($this->request->is('post')) {
            if (isset($this->request->data['ChangeLevel'])) {
                $this->Fighter->changeLevel($level_possible, $user_fighter[0]['Fighter']['id'], $this->request->data['ChangeLevel']['skill']);
                if ($this->request->data['ChangeLevel']['skill'] == 'Force') {
                    $user_fighter[0]['Fighter']['skill_strength'] = $user_fighter[0]['Fighter']['skill_strength'] + 1;
                }
                if ($this->request->data['ChangeLevel']['skill'] == 'Vue') {
                    $user_fighter[0]['Fighter']['skill_sight'] = $user_fighter[0]['Fighter']['skill_sight'] + 3;
                }
            }
//Récupération du résultat du formulaire
            $fighter_id = $user_fighter[0]['Fighter']['id'];
           
            if (isset($_FILES['avatar'])) {
               
                if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                    $imageName = "avatar_" . $fighter_id . ".jpg";
                    $this->set('imageName', $imageName);
//déplacement de l'image d'avatar dans le dossier "webroot/img/uploads/
//avec le nom avatar_id.jpg
                    if (move_uploaded_file(
                        $_FILES['avatar']['tmp_name'], WWW_ROOT . 'img/uploads/avatar_' . $fighter_id . ".jpg"
                    )
                    ) {
                        echo "Le transfert s'est bien deroule";
                    } else
                        echo "erreur sur le transfert";
                }
            }
            $this->set('raw', $user_fighter);
        }
    }
    
    public function diary()
    {
        $playersInfo = $this->Fighter->getCurrentFighter($this->Session->read("Auth.User.id"));
        if(!empty($playersInfo)){
            $FighterSkillSight = $this->Fighter->getSkillSight($playersInfo['Fighter']);
            $FighterCoordinate_x = $this->Fighter->getCoordinate_x($playersInfo['Fighter']);
            $FighterCoordinate_y = $this->Fighter->getCoordinate_y($playersInfo['Fighter']);
            $this->set('raw', $this->Event->getEvent($FighterSkillSight, $FighterCoordinate_x, $FighterCoordinate_y));
        }

    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $this->Player->loginplayer($this->request->data['sub']['login'], $this->request['sub']['password']);
        }
    }
    public function sight()
    {
        $this->set('charAll', $this->Fighter->find('all'));
        $decors = $this->Surrounding->find('all');
        $message = array();
        $firrst = $this->Fighter->getCurrentFighter($this->Session->read("Auth.User.id"));
        $user_fighter = $this->Fighter->find('all', array('conditions' => array('Fighter.player_id' => $this->Session->read("Auth.User.id"))));
        $this->Surrounding->updateSurrounding($this->Fighter->find('all'));
//Map
//Test si le joueur a assez de PA pour jouer
        if (!empty($user_fighter)) {
            $action_possible = $this->Event->actionPossible($firrst['Fighter']);
            $this->set('action_possible', $action_possible);
        }
        if ($this->request->is('post')) {

           
            if (isset($this->request->data['Fightermove'])) {
//test si un personnage est vivant lorsqu'il essaye de bougé. Si il est mort (PDV < 0 ), il est alors supprimé.
                if ($action_possible['action_possible']) {
                    $result_move = $this->Fighter->doMove($firrst['Fighter']['id'], $this->request->data['Fightermove']['direction'], $decors);
                    if ($result_move['monstre']) {
                        $this->Fighter->removeTrappedFighter($firrst['Fighter']['id']);
                        $this->set('message', "Vous avez rencontre un monstre");
                        $this->render('mort');
                    }
                    if ($result_move['puanteur']) {
                        $message[] = "Puanteur! Un monstre est a proximite";
                    }
                    if ($result_move['trap']) {
                        $this->Fighter->removeTrappedFighter($firrst['Fighter']['id']);
                        $this->set('message', "Vous avez marche sur un piege");
                        $this->render('mort');
                    }
                    if ($result_move['danger']) {
                        $message[] = "Danger! Un piege est a proximite";
                    }
                    if (!($result_move['ennemi'] || $result_move['bordure'] || $result_move['colonne'])) {
                        $this->Event->enregistrerDeplacement($firrst['Fighter'], $this->request->data['Fightermove']['direction'], $firrst['Fighter']['coordinate_x'], $firrst['Fighter']['coordinate_y']);
// ici on retire un PA apres l'action.
                        $action_possible['PA'] = $action_possible['PA'] - 1;
                        $message[]= 'Une action vient d\'avoir lieu.';
                    } else $message[] = "Deplacement impossible";
                } else {
                    $message[] = "Pas assez de points d'action";
                }
            }
        }
//Attaque
        if (isset($this->request->data['Fighterattack'])) {
// Si le perso est encore vivant
            if ($this->checkHealth($firrst['Fighter']['id'])) { // faire l'attaque
                if ($action_possible['action_possible']) {
                    $message[]= 'Une action vient d\'avoir lieu.';
                    $resultat_attaque = $this->Fighter->doAttack($firrst['Fighter']['id'], $this->request->data['Fighterattack']['direction']);
                    
                    if($resultat_attaque!=null){
                        $message[] = $this->Event->enregistrerAttaque($resultat_attaque, $firrst['Fighter']['coordinate_x'], $firrst['Fighter']['coordinate_y']);
                    }
                    $this->Fighter->removeDeadFighter();
                } else {
                    $message[] = "Pas assez de points d'action";
                }
            }
        }
//MAP Apres traitement.
        if (($this->Session->read('Auth.User')))
        {
            if(!empty($user_fighter)) {
                $result_map = $this->Fighter->creerMap($user_fighter[0]['Fighter']['id'], $this->Surrounding->find('all', array('conditions' => array('Surrounding.type' => 'column'))));
                $this->set('map', $result_map['map']);
                $this->set('persVisibles', $result_map['persVisibles']);
            }
        }
        if (!empty($user_fighter)) {
            $this->set('action_possible', $action_possible);
        }
        $this->set('message', $message);
        $this->set('Fighters', $this->Fighter->find('all'));
        $this->set('Tools', $this->Tool->find('all'));
        $this->set('Fighter', $this->Fighter->find('all', array('conditions' => array('Fighter.player_id' => $this->Session->read("Auth.User.id")))));
    }

    function createchar()
    {
//création
        if ($this->request->is('post')) {
//Supprime l'ancien personage de l'utilisateur si il existe
            $fighter = $this->Fighter->find('first', array('conditions' => array('Fighter.player_id' => $this->Session->read("Auth.User.id"))));
            if (!empty($fighter)) {
                $this->Event->enregistrerDepart($fighter);
                $this->Fighter->removeOldFighter($this->Session->read('Auth.User.id'));
            }
            $result_crea = $this->Fighter->createChar($this->request->data['Createchar']['create_name'], $this->Session->read('Auth.User.id'));
            $this->Event->enregistrerCreation($this->request->data['Createchar']['create_name'], $result_crea['x'], $result_crea['y']);
            return $this->redirect('sight');
        }
    }
    
    function checkHealth($id)
    {
        $fighters = $this->Fighter->findById($id);
        if ($fighters['Fighter']['current_health'] <= 0) {
            $this->Fighter->delete($fighters['Fighter']['id']);
            return false;
        } else {
            return true;
        }
        $Fighterss = $this->Fighter->find('all');
// echo $fighters['Fighter']['current_health'];
        foreach ($Fighterss as $fight)
            if ($fight['Fighter']['current_health'] <= 0) {
                $this->Fighter->delete($fight['Fighter']['id']);
                return false;
            } else {
                return true;
            }
    }
    public
    function chat()
    {
        if ($this->Session->read('Auth.User')) {
            $currentFighter = $this->Fighter->getCurrentFighter($this->Session->read("Auth.User.id"));
            $this->set('Fighter', $currentFighter);
            if (!empty($currentFighter)) {
                $addMessageOK = 2;
                $addShoutOk = 2;
                $privateMessages = $this->Message->getMessage($currentFighter);
                foreach ($privateMessages as &$messages) {
                    foreach ($messages as &$message) {
                        $fighterFrom = $this->Fighter->getById($message['fighter_id_from']);
                        if($fighterFrom != null){
                            $message['fighter_name_from'] = $fighterFrom['Fighter']['name'];
                        }
                        else{
                            $message = null;
                        }
                    }
                }
                $this->set('privateMessages', $privateMessages);
                if ($this->request->is('post')) {
                    if (isset($this->request->data['Message'])) {
                        $fighterTo = $this->Fighter->findFighterWithName($this->request->data['Message']['fighterName']);
                        $addMessageOK = $this->Message->addMessage($this->request->data, $fighterTo, $currentFighter);
                    }
                    if (isset($this->request->data['Shout'])) {
                        $shoutMessage = $this->request->data['Shout']['name'];
                        $addShoutOk = $this->Event->addMessage($currentFighter['Fighter'], $shoutMessage);
                    }
                }
                $this->set('addShoutOk', $addShoutOk);
                $this->set('addMessageOk', $addMessageOK);
            }
        }
    }
}
