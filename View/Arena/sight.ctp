page sight

<?php pr($raw); ?>

<?php
echo $this->Form->create('Fightermove');
echo $this->Form->input('direction', array('options' =>array('north' => 'north', 'south' =>'south', 'west' =>'west', 'east' =>'east'), 'default' =>'east'));
echo $this->Form->end('Move');
?>