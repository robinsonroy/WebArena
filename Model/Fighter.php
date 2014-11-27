<?php
App::uses('AppModel', 'Model');

class Fighter extends AppModel
{
    public $displayField = 'name';
    public $belongsTo = array(
        'Player' => array(
            'className' => 'Player',
            'foreignKey' => 'player_id',
        ),
    );

    function doMove($fighterId, $direction) // ATTENTION UTILISABLE QUE SUR LE FIGHTER EN COURS DE JEU
    {
        // récupérer la position et fixer l'id de travail
        $datas = $this->read(null, $fighterId);
        // falre la modif
        if ($direction == 'north')
            $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] + 1);
        elseif ($direction == 'south')
            $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] - 1);
        elseif ($direction == 'east')
            $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] + 1);
        elseif ($direction == 'west')
            $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] - 1);
        else
            return false;
        // sauver la modif
        $this->save();
    }

    //Renvoie le niveau auquel peut passer le perssonnage si c'est possible,
    //0 sinon
    function determinerNiveau($fighter)
    {
        $niveau_actuel = $fighter['level'];

        //tous les 4pts d'xp, le fighter monte de niveau
        $niveau_possible = $fighter['xp'] / 4;

        //si le player a plus d'expérience que de niveau
        if ($niveau_actuel < $niveau_possible) {
            return ($niveau_actuel + 1);
        } else
            return 0;
    }

    function changerNiveau($level_possible, $user_fighter)
    {

    }

    /* // TEST FONCTION DELETE
            public function deletechar(){
    echo "deletechar ici";
                if( $this->Fighter->deleteAll($this->request->data($this->requet->data['Delete']['delete'])))
                {
                    echo "succes";
                }else
                {
                    echo"fail";

                }
            }*/
    function doAttack($id, $id2, $direction)
    {
        // On recupe l'id du méchant.
        $datas = $this->read(null, $id);
        $datas2 = $this->read(null, $id2);

        $this->id=$id;

        switch ($direction) {
            case "east":
            {
                if ($datas['Fighter']['coordinate_x'] + 1 == $datas2['Fighter']['coordinate_x']) {
                    $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                    $this->saveField('xp', $datas['Fighter']['xp'] + 1);
                    echo "Succes";
                } else {
                    echo "Raté";
                }
            }
                break;
            case "west":
            {
                if ($datas['Fighter']['coordinate_x'] - 1 == $datas2['Fighter']['coordinate_x']) {
                    $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                    $this->saveField('xp', $datas['Fighter']['xp'] + 1);

                    echo "Succes";
                } else {
                    echo "Raté";
                }
            }
                break;
            //  $this->set('current_health', $datas['Fighter']['current_health']-1);
            case "north" :
            {
                if ($datas['Fighter']['coordinate_y'] + 1 == $datas2['Fighter']['coordinate_y']) {
                    $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                    $this->saveField('xp', $datas['Fighter']['xp'] + 1);

                    echo "Succes";
                } else {
                    echo "Raté";
                }
            }
                break;
            case "south" :
            {
                if ($datas['Fighter']['coordinate_y'] - 1 == $datas2['Fighter']['coordinate_y']) {
                    $this->set('current_health', $datas2['Fighter']['current_health'] - 1);
                    $this->saveField('xp', $datas['Fighter']['xp'] + 1);

                    echo "Succes";
                } else {
                    echo "Raté";
                }
            }
                break;
        }

        $this->save();
        return true;
    }

    public function changeLevel($fighterId, $level)
    {
        $this->id = $fighterId;
        $this->saveField('level', $level);
        return true;
    }

    public function timeManager($time)
    {
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