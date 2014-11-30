<?php

$this->assign('title', 'Création de personnage');
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">
        <h1>Creation d'un personnage</h1>
<?php

//Si authoriser / connecter :


if($this->Session->read('Auth.User'))
{

echo $this->Form->create('Createchar');
echo $this->Form->input('create_name');

echo $this->Form->end('Create');

}else{

        echo "Veuillez vous connecter <br>";
        echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
    }
    ?>
    </div>

</div>