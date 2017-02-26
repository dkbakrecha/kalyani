<?php
// app/Model/User.php
App::uses('AppModel', 'Model');

class SubCategory extends AppModel {
    //public $hasOne = 'Category';
    public $actsAs = array('Containable');
    public $hasMany = array(
        'Product' => array(
            //'class' => 'Subcategory',
            //'alias' => 'sub_category',
            'conditions' => array('Product.status' => 1),
            'foreignKey' => 'sub_category_id',
            'fields' =>array('id','title','status')
        )
    );
}
