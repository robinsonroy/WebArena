<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeEmail','Network/Email');

/**
 * Created by PhpStorm.
 * User: thibs911
 * Date: 17/11/2014
 * Time: 11:19
 */

class UsersController extends AppController {

    public $uses = array('User', 'Fighter', 'Event');
    public $components = array('RequestHandler','Auth');

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('add', 'recover','logout');
        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array(
                    'username'=>'email',
                    'password'=>'password'
                )
            )
        );
    }
// MAIL AUTO
    public function sendEmail($mail_dest)
    {
        $mail = new CakeEmail('gmail');
        $mail->to($mail_dest)
            ->from('webarenagroupsi408cf@gmail.com')
            ->subject('Contact :: Site')
            ->send('Welcome, voici les rules:');


    }
 // LOGI?
    public function login() {

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect(array('controller' => 'Arena', 'action' => 'sight')));
            } else {
                $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
            }
        }
    }
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }


    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function recover()
    {

    }


    // REGISTER
    public function add() {
        if ($this->request->is('post')) {
            $email=$this->request->data['User']['email'];

            // Envoie mail auto
            if ($this->sendEmail($email)){echo "Email sent";}

            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['Player']['password']);
        }
    }

    public function delete($id = null) {
        // Avant 2.5, utilisez
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }

    public function profile(){

        $fighter = $this->User->findById(1);
        $this->set('fighter',$fighter);
        $this->set('user', $this->User);
    }

} 