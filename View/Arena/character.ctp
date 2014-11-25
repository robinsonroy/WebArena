
<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">

<?php

$this->assign('title', 'Votre personnage');
if($this->Session->read('Auth.User'))
{

?> Veuillez choisir un personnage <br><?php

    foreach ($fighters as $fight)
    {
        echo $fight['Fighter']['name'];
        echo "<a href='' >Utiliser</a>";
        echo"<br>";

    }
pr( $fighters);
}else{
echo "Veuillez vous connecter <br>";
echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
}
?>
</div>
    </div>