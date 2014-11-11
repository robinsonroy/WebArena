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

        function doMove($fighterId, $direction)
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
            if ($datas['Fighter']['coordinate_x']-1==$$datas2['Fighter']['coordinate_x'])
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
                    if ($datas['Fighter']['coordinate_y']+1==$$datas2['Fighter']['coordinate_y'])
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

