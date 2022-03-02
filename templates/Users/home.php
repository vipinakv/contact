<div class="main">
        <div class="container">
        <span>Welcome <?=$name?></span>
                <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => '']) ?>
            <div class="header">
                <h3>
                   Add Contacts
                </h3>
            </div>
            <div class="add-contact">
                
            <?php
            $myTemplate = [
                'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
                //'input' => '<input type="{{type}}" class="form-control is-invalid" name="{{name}}"{{attrs}}/>',
                'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
                'error' => '<div class="invalid-feedback">{{content}}</div>'
            ];

            $this->Form->setTemplates($myTemplate)
            ?>
        <?=$this->Form->create($contact)?>
        <?=$this->Form->control('name',[
                    'label' => '',
                    'placeholder' => 'name',
                    'required'=>false,
                    'class' => $this->Form->isFieldError('name') ? 'form-control is-invalid' : 'form-control',
        ]);?>
        <?=$this->Form->control('email',[
                  'label' => '',
                  'type' => 'text',
                  'placeholder' => 'email',
                  'required' => false,
                  'class' => $this->Form->isFieldError('email') ? 'form-control is-invalid' : 'form-control'
        ]);?>
        <?=$this->Form->control('phone',[
                  'label' => '',
                  'type' => 'phone',
                  'placeholder' => 'phone',
                  'required'=>false,
                  'class' => $this->Form->isFieldError('phone') ? 'form-control is-invalid' : 'form-control'
        ]);?>
        <?=$this->Form->submit('Add',['class' => 'btn btn-primary','style'=> 'margin-top:20px;']);?>
        <?=$this->Form->end();?>
            </div>
            <?php if(count($user_contacts) != 0):?>
            <div class="header">
                <h3>
                   My Contacts
                </h3>
               
            </div>
            <section class="contact-table">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Ph No</th>
                        <th scope="col">Email</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($user_contacts as $user_contact) :
                        ?>
                            <tr>
                                <td><?=$user_contact->name?></td>
                                <td><?=$user_contact->phone?></td>
                                <td><?=$user_contact->email?></td>
                            </tr>
                            <?php endforeach;?>
                    </tbody>
                  </table>
<?php endif;?>
            </section>
        </div>
    </div>
