<?php

$this->assign('title', 'Choix avatar');
pr($id);

echo $this->Form->create('avatar', array('type' => 'file'));
echo $this->Form->input('avatar_image', array('type' => 'file', 'name' => 'avatar'));
//echo $this->Form->end('Submit');
//echo $this->Form->create('Fighterchoice');
echo $this->Form->input('fighter_choice', array('options' => $fighterList));
echo $this->Form->end('Choose');

//image dsplay
if (isset($imageName)) {
    echo $this->Html->image(WWW_ROOT . 'img\\upload\\' . $imageName, array('alt' => 'uploaded image'));
    echo WWW_ROOT . 'img\\upload\\' . $imageName;
}
?>



