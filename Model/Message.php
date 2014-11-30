<?php

App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Message extends AppModel {

    function addMessage($dataMessage, $fighter){

        pr($name = $dataMessage['Message']['fighterName']);
        pr($message = $dataMessage['Message']['message']);


    }
}
