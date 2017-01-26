<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class UserController extends AppController {
    var $uses = array('User', 'Rule', 'Group');
    //var $components = array('Email');//var $layout = 'authake';

    //var $scaffold;
    function denied(){// display this view (/app/views/users/denied.ctp) when the user is denied
    }

    function message()
    {// display this view if you want to say something important to your users.
        // For example (your password was changed and you need to receive mail to
        // confirm it.)
    }

    /**
    * Confirm the email change if needed
    */
    function verify($code = null) {
        if (Configure::read('Authake.registration') == false)
        {
            $this->redirect('/');
        }

        if ($code != null)
        {
            $this->request->data['User']['code'] = $code;
        }

        if (!empty($this->request->data))
        {
            $this->User->recursive = 0;
            $user = $this->User->find('first', array('conditions'=>array('emailcheckcode'=>$this->request->data['User']['code'])));

            if (empty($user))
            {// bad code or email
                $this->Session->setFlash(__('Não foi possivel verificar! Dados errados.'), 'error');
            }
            else
            {
                $user['User']['emailcheckcode'] = '';
                $this->User->unbindModel(array('hasAndBelongsToMany'=>array('Group')), false);
                $this->User->save($user);

                if ($this->Authake->getUserId() == null)
                {//User need to be redirected to login
                    $this->Session->setFlash(__('O código de confirmação foi aceite. Pode agora efectuar login.'), 'success');
                    $this->redirect(array('action'=>'login'));
                }
                else
                {
                    $this->Session->setFlash(__('O código de confirmação foi aceite. Obrigado!'), 'success');
                    $this->redirect(array('action'=>'index'));
                }
            }
        }
    }

    /**
    * User registration
    */
    function register() {
        if (Configure::read('Authake.registration') == false)
        {
            $this->redirect('/');
        }

        if (!empty($this->request->data))
        {
            $this->User->recursive = 0;/* If settings say we should use only email info instead of username/email, skip this */
            if (Configure::read('Authake.useEmailAsUsername') == false)
            {
                $exist = $this->User->findByLogin($this->request->data['User']['login']);

                if (!empty($exist))
                {
                    $this->Session->setFlash(__('Este nome de utilizador já esta utilizado!'), 'error');
                    return;
                }
            }
            else
            {
                $exist = $this->User->findByEmail($this->request->data['User']['email']);

                if (!empty($exist))
                {
                    $this->Session->setFlash(__('Este email já está utilizado!'), 'error');
                    return;
                }
            }
            $pwd = $this->__makePassword($this->request->data['User']['password1'], $this->request->data['User']['password2']);

            if (!$pwd)
            {
                return;
            }

            // password is invalid...
            $this->request->data['User']['password'] = $pwd;
            $this->request->data['User']['emailcheckcode'] = md5(time()*rand());
            $this->User->create();//add default group if there is such thing

            if (Configure::read('Authake.defaultGroup') != null && Configure::read('Authake.defaultGroup') != false)
            {
                $groups = $this->Group->find('all', array('fields'=>array('Group.id'), 'conditions'=>array('Group.id'=>Configure::read('Authake.defaultGroup'))));

                foreach ($groups as $group)
                {
                    $this->request->data['Group']['Group'][] = $group['Group']['id'];
                }
            }

            //

            if ($this->User->save($this->request->data))
            {// send a mail to finish the registration
                $email = new CakeEmail();
                $email->to($this->request->data['User']['email']);
                $email->subject(sprintf(__('Confirmação de registo em %s '), Configure::read('Authake.service')));
                $email->viewVars(array('service' => Configure::read('Authake.service'), 'code'=> $this->request->data['User']['emailcheckcode']));
                $email->replyTo(Configure::read('Authake.systemReplyTo'));
                $email->from(Configure::read('Authake.systemEmail'));
                $email->emailFormat('html');//$this->Email->charset = 'utf-8';
                $email->template('Authake.register');//Set the code into template
                //$this->set('code', $this->request->data['User']['emailcheckcode']);
                //$this->set('service', Configure::read('Authake.service'));

                if ($email->send())
                {
                    $this->Session->setFlash(__('Irá receber um email com um código para finalizar o seu registo...'), 'info');
                }
                else
                {
                    $this->Session->setFlash(sprintf(__('Erro ao enviar e-mail de confirmação. Por favor contacte o administrador em %s'), Configure::read('Authake.systemReplyTo')), 'error');
                }
                if(!isset($this->request->data['Requester']))
                {
                    $this->redirect(array('controller'=>'user', 'action'=>'login'));
                }
                else
                {
                    return $this->User->id;
                }
            }
            else
            {
                $this->Session->setFlash(__('Erro ao efectuar registo!'), 'error');
            }
        }
    }

    /**
    * Function which allow user to change his password if he request it
    */
    function pass($code = null){
        if ($this->Authake->getUserId() > 0)
        {
            $this->Session->setFlash(__('Tem login efectuado. Altere a password no seu perfil.'), 'warning');
            $this->redirect(array('action'=>'index'));
        }

        $this->User->recursive = 0;

        if (!empty($this->request->data))
        {
            $user = $this->User->find('first', array('conditions'=>array('passwordchangecode'=>$this->request->data['User']['passwordchangecode'])));

            if (!empty($user))
            {
                $pwd = $this->__makePassword($this->request->data['User']['password1'], $this->request->data['User']['password2']);

                if (!$pwd)
                {
                    return;
                }

                // password is invalid...
                $user['User']['password'] = $pwd;
                $user['User']['passwordchangecode'] = '';
                $this->User->unbindModel(array('hasAndBelongsToMany'=>array('Group')), false);

                if ($this->User->save($user))
                {//
                    $this->Session->setFlash(__('A sua password foi alterada! Pode agora iniciar sessão!'), 'success');
                    $this->redirect(array('action'=>'login'));
                }
                else
                {
                    $this->Session->setFlash(__('Erro ao guardar a sua password!'), 'error');
                }
            }
        }

        if ($code != null)
        {
            $this->request->data['User']['passwordchangecode'] = $code;
        }
    }

    /**
    * Login functionality
    */
    function login($Authake = null){
        $this->layout = 'login';
        if(!isset($this->Authake))
        {
            $this->Authake = $Authake;
        }

        if ($this->Authake->isLogged())
        {
            if(!isset($this->request->data['requester']))
            {
                $this->Session->setFlash(__('Já tem sessão iniciada!'), 'info');
                $this->redirect(Configure::read('Authake.loggedAction'));
            }
            else
            {
                return __('Já tem sessão iniciada!');
            }
        }


        if (!empty($this->request->data) )
        {
            $login = $this->request->data['User']['login'];
            $password = $this->request->data['User']['password'];

            if (Configure::read('Authake.useEmailAsUsername') == false)
            {
                $user = $this->User->findByLogin($login);
            }
            else
            {
                $user = $this->User->findByEmail($login);
            }

            if (empty($user))
            {
                if(!isset($this->request->data['requester']))
                {
                    $this->Session->setFlash(__('Nome de utilizador ou password inválidos!'), 'error');
                    return;
                }
                else
                {
                    return __('Nome de utilizador ou password inválidos!');
                }
            }

            // check for locked account

            if ($user['User']['id'] != 1 and $user['User']['disable'])
            {
                if(!isset($this->request->data['requester']))
                {
                    $this->Session->setFlash(__('A sua conta encontra-se desactivada!'), 'error');
                    $this->redirect('/');
                }
                else
                {
                    return __('A sua conta encontra-se desactivada!');
                }
            }

            // check for expired account
            $exp = $user['User']['expire_account'];

            if ($user['User']['id'] != 1 and $exp != '0000-00-00' and $exp != null and strtotime($exp) < time())
            {
                if(!isset($this->request->data['requester']))
                {
                    $this->Session->setFlash(__('A sua conta expirou!'), 'error');
                    $this->redirect('/');
                }
                else
                {
                    return __('A sua conta expirou!');
                }
            }

            // check for not confirmed email

            if ($user['User']['emailcheckcode'] != '')
            {
                if(!isset($this->request->data['requester']))
                {
                    $this->Session->setFlash(__('O seu registo ainda não foi confirmado!'), 'warning');
                    $this->redirect(array('action'=>'verify'));
                }
                else
                {
                    return __('O seu registo ainda não foi confirmado!');
                }
            }

            $userdata = $this->User->getLoginData($login, $password);

            if (empty($userdata))
            {
                if(!isset($this->request->data['requester']))
                {
                    $this->Session->setFlash(__('Nome de utilizador ou password inválidos!'), 'error');
                    return;
                }
                else
                {
                    return __('Nome de utilizador ou password inválidos!');
                }
            }
            else
            {
                if ($user['User']['passwordchangecode'] != '')
                {//clear password change code (if there is any)
                    $this->User->unbindModel(array('hasAndBelongsToMany'=>array('Group')), false);
                    $user['User']['passwordchangecode'] = '';
                    $this->User->save($user);
                }

                $this->Authake->login($userdata['User']);
                if(!isset($this->request->data['requester']))
                {
                    $this->Session->setFlash(__('Tem sessão inciada como ').$userdata['User']['login'], 'success');

                    if (($next = $this->Authake->getPreviousUrl()) !== null)
                    {
                        $this->redirect($next);
                    }
                    else
                    {
                        $this->redirect(Configure::read('Authake.loggedAction'));
                    }
                }
                else
                {
                    return true;
                }
            }
        }
    }

    function lost_password()
    {
        if (Configure::read('Authake.registration') == false)
        {
            $this->redirect('/');
        }

        $this->User->recursive = 0;

        if (!empty($this->request->data))
        {
            $loginoremail = $this->request->data['User']['loginoremail'];

            if ($loginoremail)
            {
                $user = $this->User->findByLogin($loginoremail);
            }

            if (empty($user))
            {
                $user = $this->User->findByEmail($loginoremail);
            }

            if (!empty($user))
            {
                // ok, login or email is ok
                //Prevent sending more than 11 e-mail
                if ($user['User']['passwordchangecode'] != '')
                {
                    $this->Session->setFlash(__('Efectuou um pedido de mudança de password. Por favor verifique o seu e-mail e use o código que enviamos'), 'error');
                    $this->redirect(array('action'=>'lost_password'));
                }
                $user['User']['passwordchangecode'] = md5(time()*rand().$user['User']['email']);
                $md5 = $user['User']['passwordchangecode'];
                $this->User->unbindModel(array('hasAndBelongsToMany'=>array('Group')), false);

                if ($this->User->save($user))
                {// send a mail with code to change the pw
                    $this->set('code', $user['User']['passwordchangecode']);
                    $this->set('service', Configure::read('Authake.service'));
                    $email = new CakeEmail();
                    ///$email->viewVars(array('service' => Configure::read('Authake.service'),'emailcheckcode'=>$this->request->data['User']['code']));
                    $email->viewVars(array('service' => Configure::read('Authake.service'), 'code'=> $md5));
                    $email->to($user['User']['email']);
                    $email->subject(sprintf(__('Pedido de alteração de password em %s '), Configure::read('Authake.service')));
                    $email->replyTo(Configure::read('Authake.systemReplyTo'));
                    //$email->from = Configure::read('Authake.systemEmail');
                    $email->from(Configure::read('Authake.systemEmail'));
                    $email->emailFormat('html');//$this->Email->charset = 'utf-8';
                    $email->charset('utf-8');
                    $email->template('Authake.lost_password');//Set the code into template

                    if ($email->send() )
                    {
                        $this->Session->setFlash(__('Se a informção estiver correcta deverá receber um e-mail com as instruções para alterar a password...'), 'warning');
                    }
                    else
                    {
                        $this->Session->setFlash(sprintf(__('Erro ao enviar e-mail de alteração de password. Por favor contacte o administrador em %s'), Configure::read('Authake.systemReplyTo')), 'error');
                    }
                }
                else
                {
                    $this->Session->setFlash(sprintf(__('Error ao alterar a password. Por favor contacte o administrador em %s'), Configure::read('Authake.systemReplyTo')), 'error');
                }
            }
            else
            {
                $this->Session->setFlash(__('Se a informação fornecida estiver correcta, deverá receber um email com as instruções para alterar a sua password...'), 'warning');
            }

            $this->redirect(array('action'=>'lost_password'));
        }
    }

    function logout()
    {
        if ($this->Authake->isLogged())
        {
            $this->Authake->logout();
            $this->Session->setFlash(__('A sua sessão foi terminada!'), 'info');
        }

        $this->redirect('/');
    }

    function beforeFilter()
    {
        parent::beforeFilter();//Overwriting the authake layout with the default one

        if (Configure::read('Authake.useDefaultLayout') == true)
        {
            $this->layout = 'default';
        }
    }
}
?>
