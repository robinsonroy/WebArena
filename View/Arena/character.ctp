<?php

$this->assign('title', 'Votre personnage');
if($this->Session->read('Auth.User'))
{
echo "Vous etes co mais pas encore les perso alligné";
pr($raw);
}else{
echo "Veuillez vous connecter <br>";
echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
}
?>
