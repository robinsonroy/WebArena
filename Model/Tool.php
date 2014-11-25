<?php
App::uses('AppModel', 'Model');

class Tool extends AppModel
{
    public $displayField = 'Tool';
    public $belongsTo = array(
        'Fighter' => array(
            'className' => 'Fighter',
            'foreignKey' => 'fighter_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );


    public function setTool($id, $type, $bonus, $coord) {
        $tool = array(
            'Tool' => array(
                'id' => $id,
                'type' => $type,
                'bonus' => $bonus,
                'coordinate_x' => $coord['x'],
                'coordinate_y' => $coord['y'],
                'fighter_id' => NULL
            )
        );
        $this->save($tool);

}
}
