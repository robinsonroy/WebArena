<?php

$this->assign('title', 'Création de personnage');
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">
<?php

//Si authoriser / connecter :


if($this->Session->read('Auth.User'))
{

var_dump($this->Session->read('Auth.User'));
// RECUPERATION ID SESSION CO.
    echo $this->Session->read('Auth.User.id');



echo $this->Form->create('Createchar');
echo $this->Form->input('create_name');
//echo $this->Form->input('create_playerid');
//echo $this->Form->input('create_coordx');
//echo $this->Form->input('create_coordy');
//echo $this->Form->input('create_level');
//echo $this->Form->input('create_xp');
//echo $this->Form->input('create_skillsight');
//echo $this->Form->input('create_skillstrength');
//echo $this->Form->input('create_skillhealth');
//echo $this->Form->input('create_current_health');
echo $this->Form->end('Create');

}else{
    echo"Veuillez vous connecter";
}
    ?>
    </div>

</div>