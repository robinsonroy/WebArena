<?php

App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Fighter extends AppModel {

    public $displayField = 'name';
    public $belongsTo = array(
        'Player' => array(
            'className' => 'Player',
            'foreignKey' => 'player_id',
        ),
    );
    //maximum de points d'action, définis en global dans le modèle
    public $PA_max = 3;
    public $PA_recup = 10;

    function doMove($fighterId, $direction) { // ATTENTION UTILISABLE QUE SUR LE FIGHTER EN COURS DE JEU
        // récupérer la position et fixer l'id de travail
        $datas = $this->read(null, $fighterId);
        $x = $datas['Fighter']['coordinate_x'];
        $y = $datas['Fighter']['coordinate_y'];
        // falre la modif
        switch ($direction) {
            case 'north':
                $y++;
                break;
            case 'south':
                $y--;
                break;
            case 'east':
                $x++;
                break;
            case 'west':
                $x--;
                break;
        }

        $listeChar = $this->find('all');

        //Tests limite map
        if ($x > 15 || $y > 10 || $x < 1 || $y < 1) {
            return false;
        }
        //Test case occupée
        foreach ($listeChar as $char) {
            if ($char['Fighter']['id'] != $fighterId && $char['Fighter']['coordinate_x'] == $x && $char['Fighter']['coordinate_y'] == $y) {
                return false;
            }
        }

        $this->set('coordinate_x', $x);
        $this->set('coordinate_y', $y);
        //on sauvegarde le temps du dernier event
        $this->set('next_action_time', date("Y-m-d h:i:s.u"));
// sauver la modif
        $this->save();
    }

    //Renvoie le niveau auquel peut passer le perssonnage si c'est possible,
    //0 sinon
    function determinerNiveau($fighter) {
        $niveau_actuel = $fighter['level'];

        //tous les 4pts d'xp, le fighter monte de niveau
        $niveau_possible = $fighter['xp'] / 4;

        //si le player a plus d'expérience que de niveau
        if ($niveau_actuel < $niveau_possible) {
            return ($niveau_actuel + 1);
        } else
            return 0;
    }

    function chercherAvatar($id) {
        $dir = new Folder(WWW_ROOT . 'img/uploads/');
        $files = $dir->find('avatar_' . $id . '.jpg');
        if (!empty($files)) {
            return 'avatar_' . $id . '.jpg';
        } else
            return null;
    }

    //En cas de la création d'un nouveau personnage,
    //il faut supprimer l'ancien personnage mort de l'utilisateur
    function removeOldFighter($user_id) {
        $fighterList = $this->find('all', array('fields' => array('player_id', 'id')));

        pr($fighterList);
        foreach ($fighterList as $fighter) {
            if ($fighter['Fighter']['player_id'] == $user_id) {
                $this->id = $fighter['Fighter']['id'];
                $this->saveField('player_id', 0);
                break;
            }
        }
    }

    function creermap($fighter) {

        $charAll = $this->find('all');

        for ($y = 15; $y > 0; $y--) {
            for ($i = 1; $i <= 15; $i++) {
                $perssonage_place = false;
                if (!empty($fighter)) {
                    if ($i < $fighter[0]['Fighter']['coordinate_x'] + $fighter[0]['Fighter']['skill_sight'] + 1 
                            && $i > $fighter[0]['Fighter']['coordinate_x'] - $fighter[0]['Fighter']['skill_sight'] - 1 
                            && $y < $fighter[0]['Fighter']['coordinate_y'] + $fighter[0]['Fighter']['skill_sight'] + 1 
                            && $y > $fighter[0]['Fighter']['coordinate_y'] - $fighter[0]['Fighter']['skill_sight'] - 1
                    ) {
                        foreach ($charAll as $char) {
                            if ($char['Fighter']['coordinate_x'] == $i && $char['Fighter']['coordinate_y'] == $y) {

                                if (!($map[$i - 1][$y - 1] = $this->chercherAvatar($char['Fighter']['id']))) {
                                    $map[$i - 1][$y - 1] = 'char.png';
                                }
                                else $map[$i - 1][$y - 1] = 'uploads/'.$map[$i - 1][$y - 1];
                                $perssonage_place = true;
                                
                            }
                        }
                        if ($perssonage_place == false) {
                            $map[$i - 1][$y - 1] = 'vue.png';
                            $perssonage_place = true;
                            
                        }
                    }
                }


                if ($perssonage_place == false) {
                    $map[$i - 1][$y - 1] = 'noir.png';
                }
            }
        }
        return $map;
    }

    function doAttack($id, $id2, $direction) {
        echo "salut";
        // On recupe l'id du méchant.
        $datas = $this->findById($id);
        $datas2 = $this->findById($id2);
        $direction2 = $direction;

        //on fixe l'ID sur l'attaquant pour les changements.
        $this->id = $id;

        switch ($direction) {
            case "east": {
                    if ($datas['Fighter']['coordinate_x'] + 1 == $datas2['Fighter']['coordinate_x']) {
                        $this->set('xp', $datas['Fighter']['xp'] + 1);
                        $attaque_touche = true;
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }
                break;
            case "west": {
                    if ($datas['Fighter']['coordinate_x'] - 1 == $datas2['Fighter']['coordinate_x']) {
                        $attaque_touche = true;
                        $this->set('xp', $datas['Fighter']['xp'] + 1);

                        echo "Succes";
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }

                break;
            case "north" : {
                    if ($datas['Fighter']['coordinate_y'] + 1 == $datas2['Fighter']['coordinate_y']) {
                        $attaque_touche = true;
                        $this->set('xp', $datas['Fighter']['xp'] + 1);

                        echo "Succes";
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }
                break;
            case "south" : {
                    if ($datas['Fighter']['coordinate_y'] - 1 == $datas2['Fighter']['coordinate_y']) {
                        $attaque_touche = true;
                        $this->set('xp', $datas['Fighter']['xp'] + 1);

                        echo "Succes";
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }
                break;
        }
        $this->save();



        $this->id = $id2;


        switch ($direction2) {
            case "east": {
                    if ($datas['Fighter']['coordinate_x'] + 1 == $datas2['Fighter']['coordinate_x']) {
                        $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                        $attaque_touche = true;
                        echo "succes";
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }
                break;
            case "west": {
                    if ($datas['Fighter']['coordinate_x'] - 1 == $datas2['Fighter']['coordinate_x']) {
                        $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                        $attaque_touche = true;

                        echo "Succes";
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }

                break;
            case "north" : {
                    if ($datas['Fighter']['coordinate_y'] + 1 == $datas2['Fighter']['coordinate_y']) {
                        $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                        $attaque_touche = true;

                        echo "Succes";
                    } else {
                        $attaque_touche = false;
                        echo "raté";
                    }
                }
                break;
            case "south" : {
                    if ($datas['Fighter']['coordinate_y'] - 1 == $datas2['Fighter']['coordinate_y']) {
                        $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                        $attaque_touche = true;
                        echo "Succes";
                    } else {
                        $attaque_touche = false;
                        echo "Raté";
                    }
                }
                break;
        }
        $this->save();

        pr($this->PA_actuel);

        $this->PA_actuel--;
        $result = array(
            'nom_attaquant' => $datas['Fighter']['name'],
            'direction' => $direction,
            'attaque_touche' => $attaque_touche,
            'nom_attaque' => $datas2['Fighter']['name'],
            'attaque_reussi' => true
        );

        return $result;
    }

    function changeLevel($level, $fighterId, $skill) {

        $datas = $this->read(null, $fighterId);

        $this->id = $fighterId;

        $datas['Fighter']['level'] = $level;

        //application de l'amélioraation des compétences
        switch ($skill) {
            //Amélioration de la compétence Force
            case 1:
                $this->saveField('skill_strength', $datas['Fighter']['skill_strength'] + 1);
                break;
            //Amélioration de la compétence Vue
            case 2 :
                $this->saveField('skill_sight', $datas['Fighter']['skill_sight'] + 1);
                break;
            //Amélioration de la compétence Santé
            case 3:
                $this->saveField('skill_health', $datas['Fighter']['skill_health'] + 1);
                break;
        }

        $this->saveField('level', $level);
        $this->saveField('current_health', $datas['Fighter']['skill_health']);
    }

    public function timeManager($time) {
        $time = $time - 1;
        return $time;
    }

    /*
      public function create_map()
      {
      // $map=array(array());
      //parcours de la liste des perssonnages
      //test collision:il ne faut pas qu'il y ait déja qqh sur la case
      // $map=array[$i][$j];
      echo   "<table id='map' class='table table-striped'>";

      for($i=0;$i<12;$i++)
      {

      echo "<tr>";
      for ($y=0;$y<12;$y++)
      {
      //echo "<td id='$map[$i][$y]'> X </td>"
      echo "<td id='$i $y'> X </td>";
      }
      echo "</tr>";
      }
      echo "</table>";

      }
     */
}
