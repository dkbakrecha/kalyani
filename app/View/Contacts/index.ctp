<!-- Inline CSS styling for reload anchor element -->

 <?php
// prd($captcha_fields);
echo $this->start('css');
echo $this->Html->script('jquery-1.11.1.min');
echo "<style>
            .reload {
              font-family: Verdana, Geneva, sans-serif;
              display: block;
            }
            fieldset {
              padding: 0;
            }
            a, img, input {
              padding: 0.3% 0.5%;
            }
          </style>";
echo $this->end();
?>



        <!-- Captcha form elements -->
        <?php
        echo $this->Form->create('Contact');
        echo $this->Form->inputs(array('legend' => '* Supports multiple form captchas and themes (currently random)'));
        foreach ($captcha_fields as $index => $captcha) {
            echo $this->Html->image($captcha . '.jpg', array('id' => $captcha));
            echo $this->Html->link('reload image &#x21bb;', '#', array('class' => 'reload', 'escape' => false));
            echo $this->Form->input($captcha, array('label' => 'Captcha', 'value' => '', 'tabindex' => $index + 1));
        }
        echo $this->Form->end('Submit');
        ?>

        <!-- Javascript reload click event to reload captcha image -->
        <?php
        $this->Js->get('.reload')->event('click', "$(this).prev().attr('src', $(this).prev().attr('src') + '?' + new Date().getTime())"
        );
        ?>



   
