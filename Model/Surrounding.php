<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Surrouding
 *
 * @author adrien
 */
App::uses('AppModel', 'Model');


class Surrounding extends AppModel {

    function updateSurrounding($charAll) {
        //Test existence Monstre
        $monster = $this->find('first', array('conditions' => array('Surrounding.type' => 'monster')));
        $traps = $this->find('all', array('conditions' => array('Surrounding.type' => 'trap')));
        $columns = $this->find('all', array('conditions'=> array('Surrounding.type' => 'column')));
        $decors = $this->find('all');
        if (empty($monster)) {
            $this->create();

            do {
                $x = rand(1, 15);
                $y = rand(1, 10);

                $place = true;
                foreach ($charAll as $char) {
                    if ($char['Fighter']['coordinate_x'] == $x && $char['Fighter']['coordinate_y'] == $y)
                        $place = false;
                }
                foreach ($decors as $decor) {
                    if ($decor['Surrounding']['coordinate_x'] == $x && $decor['Surrounding']['coordinate_y'] == $y)
                        $place = false;
                }
                
            }while ($place == false);

            $data = array(
                'type' => "monster",
                'coordinate_x' => $x,
                'coordinate_y' => $y,
            );
            $this->save($data);
            $this->clear();
        }
        
        if(count($traps) < 15)
        {
            for($i = count($traps); $i<15;$i++)
            {
                $this->create();

            do {
                $x = rand(1, 15);
                $y = rand(1, 10);

                $place = true;
                foreach ($charAll as $char) {
                    if ($char['Fighter']['coordinate_x'] == $x && $char['Fighter']['coordinate_y'] == $y)
                        $place = false;
                }
                foreach ($decors as $decor) 
                    if ($trap['Surrounding']['coordinate_x'] == $x && $trap['Surrounding']['coordinate_y'] == $y)
                        $place = false;
                    
            }while ($place == false);

            $data = array(
                'type' => "trap",
                'coordinate_x' => $x,
                'coordinate_y' => $y,
            );
            $this->save($data);
            $this->clear();
            }
        }
        
        if(count($columns)<15)
        {
            for($i = count($columns); $i<15;$i++)
            {
                $this->create();

            do {
                $x = rand(1, 15);
                $y = rand(1, 10);

                $place = true;
                foreach ($charAll as $char) {
                    if ($char['Fighter']['coordinate_x'] == $x && $char['Fighter']['coordinate_y'] == $y)
                        $place = false;
                }
                foreach ($decors as $decor) 
                    if ($decor['Surrounding']['coordinate_x'] == $x && $decor['Surrounding']['coordinate_y'] == $y)
                        $place = false;
                    
            }while ($place == false);

            $data = array(
                'type' => "column",
                'coordinate_x' => $x,
                'coordinate_y' => $y,
            );
            $this->save($data);
            $this->clear();
            }
        }
    }
}
