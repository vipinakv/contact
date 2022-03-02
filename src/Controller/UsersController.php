<?php
declare(strict_types=1);

namespace App\Controller;
use Authentication\PasswordHasher\DefaultPasswordHasher; 
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Login
     * Date : 02-03-2022
     * Function for login
     */
    public function login()
    {
        $users = $this->Users->newEntity($this->request->getData(),['validate'=>'login']);
        if($this->request->is('post') && empty($users->getErrors()))
        {
            $user = $this->Auth->identify();
            
            if($user)
            {
                $this->Auth->setUser($user);
                $users = $this->Users;
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error("Incorrect username or password");
            }
        }
        $this->set('user',$users);
    }

    /* Date : 02-02-2022
    * Logout function
    */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Signup
     * Date : 02-03-2022
     * Function for signup
     */
    public function register()
    {
        $user = $this->Users->newEntity($this->request->getData());
        if ($this->request->is('post') && empty($user->getErrors())) {
            $userTable = TableRegistry::get('Users');
            $user = $userTable->newEmptyEntity();

            $passwordhash = new DefaultPasswordHasher();
            $name = $this->request->getData('name');
            $email = $this->request->getData('email');
            $password = $this->request->getData('password');
            $secret = $this->request->getData('secret');
            //$token = Security::hash(Security::randomBytes(32));

            $user->name = $name;
            $user->email = $email;
            $user->password = $passwordhash->hash($password);
            $user->secret = $secret;
            $user->created_at = time();
            $user->updated_at = time();
            if($userTable->save($user))
            {
                $this->Flash->success('Registration successful.Please login'); 
                return $this->redirect(['action' => 'login']);
            }
        }
        $this->set('user',$user);
        //$users = $this->paginate($this->Users);
    }

    /**
     * Home page
     * Date : 02-03-2022
     * Redirect here after login
     */
    public function home()
    {
        $user_id = $this->Auth->user('id');
        $name = $this->Auth->user('name');
        $this->loadModel('Contact');
        $this->viewBuilder()->setLayout('home');

        $query = $this->getTableLocator()->get('Contact');
        $user_contacts = $query
        ->find()
        ->where(['user_id' => $user_id])
        ->all();

        $contact = $this->Contact->newEntity($this->request->getData());
        if ($this->request->is('post') && empty($contact->getErrors())) {
            $contactTable = TableRegistry::get('Contact');
            $user = $contactTable->newEmptyEntity();

            $name = $this->request->getData('name');
            $email = $this->request->getData('email');
            $phone = $this->request->getData('phone');

            $contact->name = $name;
            $contact->email = $email;
            $contact->phone = $phone;
            $contact->user_id = $user_id;
            $contact->created_at = time();
            $contact->updated_at = time();
            if($contactTable->save($contact))
            {
                return $this->redirect(['action' => 'home']);
            }
            else
            {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }

        $this->set('contact',$contact);
        $this->set('user_contacts', $user_contacts);
        $this->set('name', $name);
    }
}
