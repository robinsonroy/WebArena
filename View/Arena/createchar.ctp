<?php
$this->assign('title', 'Création de personnage');

echo $this->Form->create('Createchar');
echo $this->Form->input('create_name');
//echo $this->Form->input('create_playerid');
echo $this->Form->input('create_coordx');
echo $this->Form->input('create_coordy');

echo $this->Form->input('create_level');
echo $this->Form->input('create_xp');
echo $this->Form->input('create_skillsight');
echo $this->Form->input('create_skillstrength');
echo $this->Form->input('create_skillhealth');
echo $this->Form->input('create_current_health');
echo $this->Form->end('Create');

/*
echo "DELETE DE PERSONANGE";
echo $this->Form->create('Delete');
echo $this->Form->input('delete');
echo $this->Form->end('Delete');

?>
