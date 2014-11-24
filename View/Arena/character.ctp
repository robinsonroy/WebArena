<?php

$this->assign('title', 'Votre personnage');
if($this->Session->read('Auth.User'))
{



pr($raw);
}else{
echo "Veuillez vous connecter <br>";
echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
}
?>
