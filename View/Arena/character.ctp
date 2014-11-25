<?php

$this->assign('title', 'Votre personnage');
if(!($this->Session->read('Auth.User')))
{
    //Si l'utilisateur n'est pas enregistré
    echo "Veuillez vous connecter <br>";
    echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
}
else if($raw[0]['Fighter']['current_health'] == 0)
{
    //Si le fighter n'as plus de vie
    echo "Votre personnage est mort!<br>";
    echo  $this->Html->link("Creation d'un personnage",array('controller'=>'Arena','action'=>'createchar'));

}
else
{
 ?>
<!--1ER ROW -->
<div class="row">
    <!--Choix Avatar-->
    <div class="col-md-3">
        <?php echo $this->Form->create('avatar', array('type' => 'file'));
echo $this->Form->input('avatar_image', array('type' => 'file', 'name' => 'avatar'));
//echo $this->Form->input('fighter_choice', array('options' => $fighterList));
echo $this->Form->end('Choose');

//image dsplay
if (isset($imageName)) {
    echo "<img >".$this->Html->image('uploads/' . $imageName, array('alt' => 'uploaded image'))."</img>";

}
?>
    </div>
    <div class="col-md-6" >
        <h3>Informations du perssonage</h3>
        <ul>
            <li>Id du perssonage : <?php echo $raw[0]['Fighter']['id'] ; ?> 
            <li>Nom du personage: <?php echo $raw[0]['Fighter']['name'];?></li> 
            <li>Coordonnée X: <?php echo $raw[0]['Fighter']['coordinate_x'];?></li>
            <li>Coordonnée Y <?php echo $raw[0]['Fighter']['coordinate_y'];?></li>
            <li>Niveau: <?php echo $raw[0]['Fighter']['level'];?></li>
            <li>Expérience: <?php echo $raw[0]['Fighter']['xp'];?></li>
            <li>Compétence Vue: <?php echo $raw[0]['Fighter']['skill_sight'];?> </li>
            <li>Compétence Force: <?php echo $raw[0]['Fighter']['skill_strength'];?></li>
            <li>Points de vie: <?php echo $raw[0]['Fighter']['skill_health'];?></li>
            <li>Vie actuelle: <?php echo $raw[0]['Fighter']['current_health'];?></li>
        </ul>
    </div>
    <!--Changer de niveau-->
    <div class="col-mod-3">
        <h3>Level UP</h3>
           <?php 
           if($choix_level != 0)
           {
                echo $this->Form->create('ChangeLevel'); 
                echo '<input type="submit" class="btn btn-danger" value="Level UP">';
                //echo $this->Form->end();
           }
           else echo "Pas assez d'expérience pour changer de niveau";
           ?> 

    </div>
</div>
<?php
}
?>
