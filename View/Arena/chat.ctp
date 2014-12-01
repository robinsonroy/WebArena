<?php

if (!($this->Session->read('Auth.User'))) {
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Veuillez vous connecter <br>";
            echo $this->Html->link('Inscription', array('controller' => 'Users', 'action' => 'add'));
            ?>
        </div>
    </div>
<?php
} else if (empty($Fighter)) {
    ?>
    <div class="row">
    <div class="col-md-6 col-md-offset-3 centered">
    <?php
    echo "Vous n'avez pas de perssonnage<br>";
    echo $this->Html->link("Creation d'un personnage", array('controller' => 'Arena', 'action' => 'createchar'));
    ?>
    </div>
    </div>
<?php
} else {
    ?>

    <div class="row">
        <div class="col-md-3">
            <?php
            if ($addMessageOk == 1) {
                ?>
                <div class="alert alert-success" role="alert">Message envoyé correctement.</div>
            <?php
            } else if ($addMessageOk == -1) {
                ?>
                <div class="alert alert-danger" role="alert">Le nom du fighter n'est pas correct.</div>
            <?php
            }
            echo $this->Form->create('Message');?>
            <div class="form-group">
                <?php echo $this->Form->input('fighterName', $options = array(
                        'class' => 'form-control',
                        'placeholder' => 'Enter fighter',
                        'label' => array('text' => 'Nom du Fighter :')
                    )
                ); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Message.title', $options = array(
                    'class' => 'form-control',
                    'placeholder' => 'Entrer un Titre',
                    'label' => array('text' => 'Titre :')
                )); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Message.message', $options = array(
                    'class' => 'form-control',
                    'row' => '3',
                    'type' => 'textarea',
                    'label' => array(
                        'text' => 'Message :'
                    )
                )); ?>
            </div>
            <input type="submit" class="btn btn-default" value="Envoyer">
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="col-md-6">
            <h4 id="chatTitle">Messages privées :</h4>
            <?php  foreach ($privateMessages as $messages) {
                foreach ($messages as $message) {
                    if ($message != null) {
                        ?>

                        <div class="list-group">
                            <a class="list-group-item">
                                <h4 class="list-group-item-heading"><?php echo $message['fighter_name_from'] ?></h4>
                                <h5 class="list-group-item-heading"><?php echo $message['title'] . " / " . $message['date'] ?></h5>

                                <p class="list-group-item-text"><?php echo $message['message'] ?></p>
                            </a>
                        </div>
                    <?php
                    }
                }
            } ?>
        </div>
        <div class="col-md-3">
            <?php if ($addShoutOk == 1) { ?>
                <div class="alert alert-success" role="alert">Message envoyé correctement.</div>
            <?php } ?>
            <h4 id="chatTitle">Crier :</h4>
            <?php echo $this->Form->create('Shout'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('Shout.name', $options = array(
                    'class' => 'form-control',
                    'row' => '3',
                    'type' => 'textarea',
                    'maxlength' => '255',
                    'label' => array(
                        'text' => 'Message :'
                    ))); ?>
            </div>
            <input type="submit" class="btn btn-default" value="Envoyer">
            <?php echo $this->Form->end(); ?>
        </div>

    </div>

<?php } ?>