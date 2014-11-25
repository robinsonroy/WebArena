<?php if($this->Session->read('Auth.User'))
{
$this->assign('title', 'WebArena : Game'); ?>

<!--1ER ROW -->
<div class="row">

    <!--1-->
    <div class="col-md-3" >
       <div class="panel panel-default" id="gauche">
           <h3>Se déplacer</h3>
           <?php
           echo $this->Form->create('Fightermove');
           echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div'=>'form-group','class'=>'form-control','default' => 'east'));
           ?>
           <input type="submit" class="btn btn-danger" value="Go">
           <h3>Level UP</h3>
           <?php
           echo $this->Form->create('ChangeLevel');
           echo $this->Form->input('level',array('options' => array(1=>'level 1',2=>'level 2',3=>'level 3',4=>'level 4'),'div'=>'form-group','class'=>'form-control', 'default' => 'level 1'));
           ?>
           <input type="submit" class="btn btn-danger" value="Level UP">
           <h3>Infos personnages</h3>

           <?php
           echo $this->Form->end();
           ?>

           <!-- Info personnages -->
<?php foreach( $Fighter as $fight)
{
        ?>Nom : <?php     echo $fight['Fighter']['name']; ?> </br>
        PV : <?php echo $fight['Fighter']['current_health']; ?> </br>
       CoordX : <?php echo $fight['Fighter']['coordinate_x'];?></br>
        CoordY : <?php echo $fight['Fighter']['coordinate_y'];?> </br><?php } ?>
<!-- VU PERSONNAGE PAS BEAU -->


       </div>

    </div>
    <div class="col-md-6" id="map">



<table id="char" class="table">
    <th>Entités</th>
    <th>CoordXY</th>
    <th>HP</th>
    <tr>
        <!-- All fighter -->
         <?php foreach($Fighters as $fighter)
            { ?> <td> <?php
                echo $fighter['Fighter']['name'];?></td><td><?php
                ?>   x :<?php echo $fighter['Fighter']['coordinate_x']; ?>
                     y: <?php echo $fighter['Fighter']['coordinate_y'];?></td><td>
                     pv :<?php echo $fighter['Fighter']['current_health']; ?>
                     </td><tr><?php
            } ?>
        </tr>

</table>

 <table id="tools" class="table">
<tr>Items</tr>
     <td> <?php ?> yo</td>
 </table>

    </div>

    <div class="col-md-3">
        <div class="panel panel-default" id="gauche">
        <?php echo $this->Form->create('Fighterattack');
            echo $this->Form->input('EnnemiID',array('div'=>'form-group','class'=>'form-control'));
            echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div' => 'form-group','class'=>'form-control','default' => 'east'));

        ?>
        <input type="submit" class="btn btn-danger" value="Attack">
        <?php
                echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS BIEN
        ?>
        </div>

    </div>


</div>

<div class ="row">
    <div class="col-md-3">


    </div>

<div class ="col-md-6">
    <p> <?php  var_dump($this->Session->read('Auth.User'));
        }else{
            ?> <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Veuillez vous connecter <br>";
            echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));

        }

        ?> </p></div></div>
</div>

<div class ="col-md-3">
    <p>  </p>
</div>


