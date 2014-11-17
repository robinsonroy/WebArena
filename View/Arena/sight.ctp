<?php pr($raw);

<<<<<<< HEAD





=======
>>>>>>> e19297bb4339db851a7c0ad7e7cef6899fb35aaa
echo $this->Form->create('Fightermove');
echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'), 'default' => 'east'));
echo $this->Form->end('Move');

<<<<<<< HEAD
echo $this->Form->create('Fighterattack');
echo $this->Form->input('id');
echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'), 'default' => 'east'));
echo $this->Form->input('id2');


echo $this->Form->end('Attack');















?>
=======
echo $this->Form->create('ChangeLevel');
echo $this->Form->input('level',array('options' => array(1=>'level 1',2=>'level 2',3=>'level 3',4=>'level 4'), 'default' => 'level 1'));
echo $this->Form->end('Change level');
>>>>>>> e19297bb4339db851a7c0ad7e7cef6899fb35aaa
