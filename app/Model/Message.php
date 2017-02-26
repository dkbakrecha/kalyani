<?php
class Message extends AppModel {
    
    
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'please enter a valid name'
            ),
            'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Between 5 to 15 characters'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ' This field is required.'
            ),
            'ruleName2' => array(
                'rule' => array('email', true),
		'message' => 'Please enter valid email.'
            ),
        ),
        'mobile' => array(
            'required' => array(
				'rule' => array('notEmpty','numeric'),
				'message' => 'This Field is required.'
			),
			'rule1' => array(
				'rule'    => 'naturalNumber',
				'message' => 'Please enter valid phone no.'
			),
			'rule2' => array(
				'rule' => array('between', 8,25),
				'message' => 'Phone No limit should be 6 to 25.'
			),
		),
        'message' => array(
            'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'This Field is required.'
			),
        )
    );

}