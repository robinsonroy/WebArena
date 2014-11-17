Choix du perssonage

<?php
echo $this->Form->create('Fighterchoice');
echo $this->Form->input('fighter_choice', array('options' => $fighterList));
echo $this->Form->end('Choose');
?>
<?php pr($fighterList); ?>



