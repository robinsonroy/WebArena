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