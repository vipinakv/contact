<div class="main" id="signup">
    <div class="content">
        <div class="header">
            <h1>
                Sign Up
            </h1>
            <div class="link">
                <span>Already have an account? <?= $this->Html->link(__('Signin'), ['action' => 'login'], ['class' => '']) ?></span>
            </div>
        </div>
        <div class="form-container">
            
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
        <?=$this->Form->control('password',[
                  'label' => '',
                  'type' => 'password',
                  'placeholder' => 'password',
                  'required'=>false,
                  'class' => $this->Form->isFieldError('password') ? 'form-control is-invalid' : 'form-control'
        ]);?>
        <?=$this->Form->control('secret',[
                  'label' => '',
                  'type' => 'password',
                  'placeholder' => 'secret',
                  'required'=>false,
                  'class' => $this->Form->isFieldError('secret') ? 'form-control is-invalid' : 'form-control'
        ]);?>
        <?=$this->Form->submit('Sign up',['class' => 'btn btn-primary','style'=> 'margin-top:20px;']);?>
        <?=$this->Form->end();?>
        </div>
    </div>
</div>