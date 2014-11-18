<?php $this->assign('title', 'WebArena : Game'); ?>


<div class="row">

    <div class="col-md-3" >
       <div class="panel panel-default" id="gauche">
           <?php
           echo $this->Form->create('Fightermove');
           echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div'=>'form-group','class'=>'form-control','default' => 'east'));
           ?>
           <input type="submit" class="btn btn-danger" value="Go">
           <?php
           echo $this->Form->end();
            ?>

           <?php
           echo $this->Form->create('ChangeLevel');
           echo $this->Form->input('level',array('options' => array(1=>'level 1',2=>'level 2',3=>'level 3',4=>'level 4'),'div'=>'form-group','class'=>'form-control', 'default' => 'level 1'));
           ?>
           <input type="submit" class="btn btn-danger" value="Level UP">

           <?php
           echo $this->Form->end();
           ?>
       </div>

    </div>
    <div class="col-md-6" id="map">
        <?php

       echo "<table id='map' class='table table-striped'>";
        for($i=0;$i<12;$i++)
        { echo "<tr>";
            for ($y=0;$y<12;$y++)
            {
                echo "<td id='$i $y'> X </td>";
            }
            echo "</tr>";
        }
    echo "</table>";
        ?>


</div>

    <div class="col-md-3">
        <div class="panel panel-default" id="gauche">
        <?php echo $this->Form->create('Fighterattack');
            echo $this->Form->input('Votre ID',array('div'=>'form-group','class'=>'form-control'));
            echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div' => 'form-group','class'=>'form-control','default' => 'east'));
            echo $this->Form->input('Ennemi ID',array('div'=>'form-group','class'=>'form-control'));
        ?>
        <input type="submit" class="btn btn-danger" value="Go">
        <?php
                echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS
        ?>
        </div>

    </div>


</div>

