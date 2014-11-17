<<<<<<< HEAD
    <?php

    App::uses('AppModel', 'Model');

    class Fighter extends AppModel {

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
                $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] + 1);
            elseif ($direction == 'south')
                $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] - 1);
            elseif ($direction == 'east')
                $this->set('coordinate_y', $datas['Fighter']    ['coordinate_y'] + 1);
            elseif ($direction == 'west')
                $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] - 1);
            else
                return false;

            // sauver la modif
            $this->save();
            return true;
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


        function doAttack($id,$id2,$direction)
        {
           // On recupe l'id du méchant.
           $datas= $this->read(null,$id);
           $datas2=$this->read(null,$id2);


            switch($direction){ // tention
                case "east": {

                                 echo $datas2['Fighter']['coordinate_x'];
                                 echo $datas['Fighter']['coordinate_x']+1;

                    if ($datas['Fighter']['coordinate_x']+1==$datas2['Fighter']['coordinate_x'])
                 {
                    $this->set('current_health', $datas['Fighter']['current_health']-1);
                     echo "Succes";

                 }else{
                    echo "Raté";
                }

            }break;
                case "west": {
            if ($datas['Fighter']['coordinate_x']-1==$datas2['Fighter']['coordinate_x'])
            {
            $this->set('current_health', $datas['Fighter']['current_health']-1);
                echo "Succes";


            }else{
                        echo "Raté";
                    }
              }
                break;
         //  $this->set('current_health', $datas['Fighter']['current_health']-1);
                case "north" : {
                    if ($datas['Fighter']['coordinate_y']+1==$datas2['Fighter']['coordinate_y'])
                    {
                        $this->set('current_health', $datas['Fighter']['current_health']-1);
                        echo "Succes";


                    }else{
                        echo "Raté";
                    }



                }
            break;

                case "south" : {

                    if ($datas['Fighter']['coordinate_y']-1==$datas2['Fighter']['coordinate_y'])
                    {
                        $this->set('current_health', $datas['Fighter']['current_health']-1);
                        echo "Succes";


                    }else{
                        echo "Raté";
                    }
                }
                    break;
            }




           $this->save();
            return true;


        }













    }

=======
<?php
/**
 * Created by PhpStorm.
 * User: Robinson
 * Date: 14/11/14
 * Time: 14:20
 */

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

    public function doMove($fighterId, $direction)
    {
        // Catch good object
        $datas = $this->read(null, $fighterId);
        // Do modification on direction
        if ($direction == 'north')
            $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] + 1);
        elseif ($direction == 'south')
            $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] - 1);
        elseif ($direction == 'east')
            $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] + 1);
        elseif ($direction == 'west')
            $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] - 1);
        else
            return false;

        // Save modification
        $this->save();
        return true;

    }

    public function changeLevel($fighterId, $level)
    {

        $this->id = $fighterId;
        $this->saveField('level', $level);

        return true;

    }

}

        
>>>>>>> e19297bb4339db851a7c0ad7e7cef6899fb35aaa
