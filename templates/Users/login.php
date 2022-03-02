

<div class="main" id="login">
    <div class="content">
        <div class="header">
            <h1>
                Sign In
            </h1>
            <div class="link">
                <span>Do not have an account? <?= $this->Html->link(__('Signup'), ['action' => 'register'], ['class' => '']) ?></span>
            </div>
        </div>
        <div class="form-container">
        <?= $this->Flash->render() ?>  
        <?php
            $myTemplate = [
                'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
                //'input' => '<input type="{{type}}" class="form-control is-invalid" name="{{name}}"{{attrs}}/>',
                'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
                'error' => '<div class="invalid-feedback">{{content}}</div>'
            ];

            $this->Form->setTemplates($myTemplate)
            ?>
        <?=$this->Form->create($user)?>
        <?=$this->Form->control('email',[
                    'label' => '',
                    'placeholder' => 'email',
                    'required'=>false,
                    'class' => $this->Form->isFieldError('email') ? 'form-control is-invalid' : 'form-control',
        ]);?>
        <?=$this->Form->control('password',[
                    'label' => '',
                    'type' => 'password',
                    'placeholder' => 'password',
                    'required'=>false,
                    'class' => $this->Form->isFieldError('password') ? 'form-control is-invalid' : 'form-control',
        ]);?>
        <?=$this->Form->submit('Sign in',['class' => 'btn btn-primary','style'=> 'margin-top:20px;']);?>
        <?=$this->Form->end();?>
        </div>
    </div>
</div>