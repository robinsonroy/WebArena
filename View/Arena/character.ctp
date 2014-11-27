

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
        <?php 
        echo $this->Form->create('avatar', array('type' => 'file'));
        echo $this->Form->input('avatar_image', array('type' => 'file', 'name' => 'avatar'));
        //echo $this->Form->input('fighter_choice', array('options' => $fighterList));
        echo $this->Form->end('Choose');
        ?> 
        Veuillez choisir un personnage <br>
        <?php

        foreach ($fighters as $fight)
        {
            echo $fight['Fighter']['name'];
            echo "<a href='' >Utiliser</a>";
            echo"<br>";

        }

        //image dsplay
        if (isset($imageName)) {
            echo "<img >".$this->Html->image('uploads/' . $imageName, array('alt' => 'uploaded image'))."</img>";

        }
        ?>
    </div>
    
    <div class="col-md-6" >
        <h3>Informations du perssonage</h3>
        <ul>
            <?php  foreach ($raw as $raws)
            { ?>
            <li>Id du perssonage : <?php echo $raws['Fighter']['id'] ; ?>
            <li>Nom du personage: <?php echo $raws['Fighter']['name'];?></li>
            <li>Coordonnée X: <?php echo $raws['Fighter']['coordinate_x'];?></li>
            <li>Coordonnée Y <?php echo $raws['Fighter']['coordinate_y'];?></li>
            <li>Niveau: <?php echo $raws['Fighter']['level'];?></li>
            <li>Expérience: <?php echo $raws['Fighter']['xp'];?></li>
            <li>Compétence Vue: <?php echo $raws['Fighter']['skill_sight'];?> </li>
            <li>Compétence Force: <?php echo $raws['Fighter']['skill_strength'];?></li>
            <li>Points de vie: <?php echo $raws['Fighter']['skill_health'];?></li>
            <li>Vie actuelle: <?php echo $raws['Fighter']['current_health'];?></li><br><br>
       <?php } ?> </ul>
    </div>
    
    <!--Changer de niveau-->
    <div class="col-mod-3">
        <div class="panel panel-default" id="gauche">
        <h3>Level UP</h3>
           <?php 
           if($choix_level != 0)
           {
                echo $this->Form->create('ChangeLevel'); 
                echo $this->Form->input('skill',array('options' => array(1=>'Force',2=>'Vue',3=>'Santé'),'div'=>'form-group','class'=>'form-control'));
                
           //echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div'=>'form-group','class'=>'form-control','default' => 'east'));
           
                echo '<input type="submit" class="btn btn-danger" value="Level UP">';
                echo $this->Form->end();
           }
           else echo "Pas assez d'expérience pour changer de niveau";
           ?> 
        </div>

    </div>
</div>
<?php
}
?>
