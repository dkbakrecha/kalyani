<?php
// app/Model/User.php
App::uses('AppModel', 'Model');

class Category extends AppModel {
    //public $hasOne = 'Category';
    
    public $hasMany = array(
        'SubCategory' => array(
            //'class' => 'Subcategory',
            //'alias' => 'sub_category',
            'conditions' => array('SubCategory.status' => '1'),
            'foreignKey' => 'category_id'
        )
    );
}
