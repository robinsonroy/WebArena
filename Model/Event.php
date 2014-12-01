<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author adrien
 */
App::uses('AppModel', 'Model');

class Event extends AppModel {

    //put your code here
    public $PA_max = 3;
    public $PA_recup = 10;

    function enregistrerDeplacement($fighter, $direction, $x, $y) {
        $this->create();

        $message = $fighter['name'] . " s'est deplace vers ";
        switch ($direction) { // tention
            case "east": $message = $message . "l'est.";
                $x++;
                break;
            case "west": $message = $message . "l'ouest.";
                $x--;
                break;
            //  $this->set('current_health', $datas['Fighter']['current_health']-1);
            case "north" : $message = $message . "le nord.";
                $y++;
                break;
            case "south" : $message = $message . "le sud.";
                $y--;
                break;
        }

        $data = array(
            'Event' => array(
                'name' => $message,
                'date' => date("Y-m-d h:i:s.u"),
                'coordinate_x' => $x,
                'coordinate_y' => $y)
        );

        $this->save($data);
    }

    function enregistrerAttaque($resultat, $x, $y) {
        //3 types de messages:
        //le pers n'as rien touché
        //le pers a attaqué mais n'as pas réussi
        //l'attaque a réussi
        //Informations nécessaires: 
        //  -nom du pers attaquant
        //  -bool si le gars a touché qqn
        //  -nom du pers attaqué
        //  -bool si l'attaque a réussi
        $this->create();

        //Construction du message
        $message = $resultat['nom_attaquant'] . " attaque ";
        switch ($resultat['direction']) { // tention
            case "east": $message = $message . "vers l'est, ";
                break;
            case "west": $message = $message . "vers l'ouest, ";
                break;
            case "north" : $message = $message . "vers le nord,  ";
                break;
            case "south" : $message = $message . "vers le sud, ";
                break;
        }
        if ($resultat['attaque_touche']) {
            $message = $message . "rencontre " . $resultat['nom_attaque'];
            if ($resultat['attaque_reussi']) {
                $message = $message . " et reussi son attaque.";
            } else {
                $message = $message . " et rate son attaque.";
            }
        } else {
            $message = $message . "et ne touche rien.";
        }

        $data = array(
            'Event' => array(
                'name' => $message,
                'date' => date("Y-m-d h:i:s.u"),
                'coordinate_x' => $x,
                'coordinate_y' => $y)
        );

        $this->save($data);
    }

    function enregistrerCreation($nom_fighter, $x, $y) {
        $this->create();
        $message = "Entree de " . $nom_fighter . " dans l'arene";
        $data = array(
            'Event' => array(
                'name' => $message,
                'date' => date("Y-m-d h:i:s.u"),
                'coordinate_x' => $x,
                'coordinate_y' => $y)
        );
        $this->save($data);
    }
    
    function enregistrerDepart($fighter)
    {
        $this->create();
        pr($fighter);
        $message = $fighter['Fighter']['name'] . " quitte l'arene";
        $data = array(
            'Event' => array(
                'name' => $message,
                'date' => date("Y-m-d h:i:s.u"),
                'coordinate_x' => $fighter['Fighter']['coordinate_x'],
                'coordinate_y' => $fighter['Fighter']['coordinate_y'])
        );
        $this->save($data);
    
    }

    function actionPossible($fighter) {
//      
        //Récupération des 3 dernières actions 
        $sous_requete = "SELECT * FROM events WHERE name like '" . $fighter['name'] . "%' ORDER BY date DESC LIMIT 3";
        $event_fighter = $this->query($sous_requete);
        //pr($event_fighter);
        //Logique de l'action: si la plus ancienne des 3 actions est trop récente,
        //yaneh elle est plus récente que 3*le délai d'attente
        //il y a eu trop d'actions, donc l'utilisateur doit attendre

        $action_possible = null;
        if (count($event_fighter) >= $this->PA_max) {
            $delai_attente = date("Y-m-d h:i:s.u", time() - $this->PA_max * $this->PA_recup);
            $temps_actuel = date("Y-m-d h:i:s.u");
            $count = $this->query("SELECT COUNT(*) FROM (" . $sous_requete . ") T WHERE date between '" . $delai_attente . "' AND '" . $temps_actuel . "'");
            //Si les 3 derniers évènements se sont déroulés avant le délai d'attente, 
            //il faut que l joueur attende avant de rejouer
            if ($count[0][0]['COUNT(*)'] < 3) {
                //le joueur peut jouer
                $action_possible = true;
                $PA = $this->PA_max - $count[0][0]['COUNT(*)'];
            } else {
                $action_possible = false;
                $PA = 0;
            }
        } else {
            $action_possible = true;
            $PA = $this->PA_max;
        }
        return $result = array(
            'action_possible' => $action_possible,
            'PA' => $PA
        );
    }

    function getEvent() {
        $events = $this->find('all', array(
            'conditions' => array('Event.date >' => date('Y-m-d H:i:s', strtotime('-1 days'))),
            'fields' => array('Event.name', 'Event.date', 'Event.coordinate_x', 'Event.coordinate_y'),
            'order' => 'Event.date DESC'
        ));
        
        
        return $events;
    }

    function addMessage($fighter, $message){
        $this->create();
        $event = array(
            'name' => $fighter['name'] .' : '. $message,
            'date' => date("Y-m-d h:i:s.u"),
            'coordinate_x' => $fighter['coordinate_x'],
            'coordinate_y' => $fighter['coordinate_y']

        );

        $this->save($event);
        return 1;
    }

}
