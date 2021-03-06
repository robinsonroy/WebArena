<?php

App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Message extends AppModel
{

    function addMessage($dataMessage, $fighterTo, $fighterFrom)
    {
        if (!isset($fighterTo['Fighter']['id'])) {
            return -1;
        } else {
            $this->create();

            $data = array(
                'Message' => array(
                    'date' => date('Y-m-d H:i:s', strtotime('0 days')),
                    'title' => $message = $dataMessage['Message']['title'],
                    'message' => $message = $dataMessage['Message']['message'],
                    'fighter_id' => $fighterTo['Fighter']['id'],
                    'fighter_id_from' => $fighterFrom['Fighter']['id']
                )
            );
            $this->save($data);
            return 1;
        }
    }

    function getMessage($currentFighter){
        $messages = $this->find('all', array(
            'conditions' => array('Message.fighter_id' => $currentFighter['Fighter']['id']),
            'order' => 'Message.date DESC'
        ));
         return $messages;
    }
}