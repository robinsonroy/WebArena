<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">

        <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

        <div class="col-sm-offset-2 col-sm-10">
            <legend><?php echo __('Connexion'); ?></legend>
        </div>

        <div class="form-group">
            <label for="UserEmail" class="col-sm-2 control-label">Email</label>
            <?php echo $this->Form->input('email', array(
                'label' => false,
                'div' => array('class' => 'col-sm-10'),
                'class' => 'form-control',
                'placeholder' => 'Entrer votre email'
            )); ?>
        </div>
        <div class="form-group">
            <label for="UserPassword" class="col-sm-2 control-label">Password</label>
            <?php echo $this->Form->input('password', array(
                'label' => false,
                'div' => array('class' => 'col-sm-10'),
                'class' => 'form-control'
            ));
            ?>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->Html->link('Mot de passe recover', array('controller' => 'users', 'action' => 'recover')); ?>
        </div>
    </div>
</div>
