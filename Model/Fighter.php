<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
/**
 * Description of Fighter
 *
 * @author adrien
 * 
 */
/**
 * function doMove
 * @todo empécher de sortir des limites de l'arène
 * @todo empecher d'entrer sur une case occupée
 * 
 */
class Fighter extends AppModel
{
    //put your code here
    public $displayField = 'name';
    
    public $belongsTo = array(
        'Player' => array(
            'className' => 'Player',
            'foreignKey' => 'player_id',
            ),
        ); 
    public function doMove($fighterid, $direction)
    {
        //Fixe l'ID du model
        $this->id = $fighterid;
        
        //récupération de la position initiale
    $xi = $this->field('coordinate_x');
    $yi = $this->field('coordinate_y');
    
    
    switch($direction)
    {
        case 'east': 
            if($xi < 14)
                $xi += 1;
             
            break;
        case 'south': 
            if($yi > 0)
                $yi -= 1;
            break;
        case 'north':
            if($yi < 14)
                $yi += 1;
            break;
        case 'west':
            if($xi > 0)
                $xi -= 1;
            break;
        }
        
        //test de collision
        if($this->query("SELECT * FROM fighters WHERE EXISTS( SELECT * FROM fighters WHERE coordinate_x = ".$xi." AND coordinate_y = ".$yi." AND id <> ".$fighterid.")"))
        {
            
        }
        else
        {
            $this->save( array(
                'Fighter' => array(
                    'coordinate_x' => $xi,
                    'coordinate_y' => $yi
                    )
            ));
        }
    }
}
