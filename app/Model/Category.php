<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Subcategory $Subcategory
 */
class Category extends AppModel {

    public function getFullMenu() {

        Cache::delete('full_menu');
        $arrMenu = Cache::read('full_menu');
        if (!$arrMenu) {

            $categories = $this->find('all', [
                'order' => ['name' => 'desc']
            ]);

            $arrMenu = [];
            foreach ($categories as $arrCategory) {

                $category = $arrCategory['Category'];

                $subcategories = $this->Subcategory->find('all', [
                    'conditions' => [
                        'Subcategory.category_id' => $category['id']
                    ],
                    'order' => ['Subcategory.name' => 'asc']
                ]);

                $arrProductSubcategories = [];
                foreach ($subcategories as $arrSubcategory) {

                    $subcategory = $arrSubcategory['Subcategory'];

                    $products = $this->Subcategory->Product->query("
                        SELECT DISTINCT Product.*
                          FROM products AS Product
                         WHERE Product.status <> 'Inativo'
                           AND Product.subcategory_id = {$subcategory['id']}
                      ORDER BY Product.name ASC
                    ");

                    $arrProductSubcategories[$subcategory['id']] = [
                        'id' => $subcategory['id'],
                        'name' => $subcategory['name'],
                        'products' => $products
                    ];
                }
                $arrMenu[$category['id']] = [
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'Subcategories' => $arrProductSubcategories
                ];
            }
            Cache::write('full_menu', $arrMenu);
        }
        return Cache::read('full_menu');
    }

    public function getMenuAvaliableToOrder() {

        Cache::delete('menu_avaliable_to_order');
        $arrMenu = Cache::read('menu_avaliable_to_order');
        if (!$arrMenu) {

            $categories = $this->find('all', [
                'order' => ['name' => 'desc']
            ]);

            $arrMenu = [];
            foreach ($categories as $arrCategory) {

                $category = $arrCategory['Category'];

                $subcategories = $this->Subcategory->find('all', [
                    'conditions' => [
                        'Subcategory.category_id' => $category['id']
                    ],
                    'order' => ['Subcategory.name' => 'asc', 'Category.name' => 'asc']
                ]);

                $arrProductSubcategories = [];
                foreach ($subcategories as $arrSubcategory) {

                    $subcategory = $arrSubcategory['Subcategory'];

                    $products = $this->Subcategory->Product->query("
                        SELECT DISTINCT Product.*
                          FROM products AS Product
                         WHERE Product.status <> 'Inativo'
                           AND Product.subcategory_id = {$subcategory['id']}
                           AND Product.avaliable_to_order = 'Sim'
                      ORDER BY Product.id ASC
                    ");

                    $arrProductSubcategories[$subcategory['id']] = [
                        'id' => $subcategory['id'],
                        'name' => $subcategory['name'],
                        'products' => $products
                    ];
                }
                $arrMenu[$category['id']] = [
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'Subcategories' => $arrProductSubcategories
                ];
            }
            Cache::write('menu_avaliable_to_order', $arrMenu);
        }
        return Cache::read('menu_avaliable_to_order');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Subcategory' => array(
            'className' => 'Subcategory',
            'foreignKey' => 'category_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
