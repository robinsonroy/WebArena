Choix du perssonage

<?php
$this->assign('title', 'Choix du personnage');
echo $this->Form->create('Fighterchoice');
echo $this->Form->input('fighter_choice', array('options' => $fighterList));
echo $this->Form->end('Choose');
?>



