<?php
$this->assign('title', 'Journal d\'events');


?>


<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">

<?php
if($this->Session->read('Auth.User'))
{
pr($raw);

$this->assign('title', 'Journal d\'events');
}
else
{
    echo "Veuillez vous connecter <br>";
    echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));


}



?>
        </div>
    </div>