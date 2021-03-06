<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">

        <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

        <div class="col-sm-offset-2 col-sm-10">
            <h2 id="titre_page"><?php echo __('Nouvel utilisateur'); ?></h2>
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
                <button type="submit" class="btn btn-default">Sign up</button>
            </div>
        </div>
    </div>
</div>
