<?php
$this->assign('title', 'Login');

echo $this->Form->create('sub');
echo $this->Form->input('login');
echo $this->Form->input('password');
echo $this->Form->end('Send');
?>