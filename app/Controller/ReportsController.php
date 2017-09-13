<?php

App::uses('AppController', 'Controller');

class ReportsController extends AppController {

    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Reports'));
        $this->set('activeReports', 'active');
    }

    public function index() {

    }

    /**
     * renomear para received_payments
     */
    public function received_payments() {
        
        $this->set('title', __('Sales by Period'));

        if ($this->request->is('post')) {
            $this->layout = 'pdf';
            
            if (
                isset($this->request->data['SalesPeriod']) &&
                isset($this->request->data['SalesPeriod']['start_date']) &&
                isset($this->request->data['SalesPeriod']['start_hour']) &&
                isset($this->request->data['SalesPeriod']['finish_date']) &&
                isset($this->request->data['SalesPeriod']['finish_hour'])
            ) {
                $startHour  = $this->request->data['SalesPeriod']['start_hour'];
                $finishHour = $this->request->data['SalesPeriod']['finish_hour'];
                
                $startDate  = DateTime::createFromFormat('d/m/Y H:i:s', $this->request->data['SalesPeriod']['start_date'] . " {$startHour}:00");
                $finishDate = DateTime::createFromFormat('d/m/Y H:i:s', $this->request->data['SalesPeriod']['finish_date'] . " {$finishHour}:59");
                
                $this->loadModel('Payment');
                $this->Payment->recursive = 0;
                $options = [
                    'fields' => [
                        'PaymentMethod.name',
                        'SUM(CASE WHEN Payment.subtotal = 0 THEN Payment.payd_value ELSE Payment.subtotal END) AS Total'
                    ],
                    'conditions' => [
                        "{$this->Payment->alias}.created BETWEEN '" . $startDate->format('Y-m-d H:i:s') . "' AND '" . $finishDate->format('Y-m-d H:i:s') . "'"
                    ],
                    'joins' => [
                        [
                            'table' => 'payment_methods',
                            'alias' => 'PaymentMethods',
                            'type' => 'INNER',
                            'conditions' => [
                                "PaymentMethods.id = {$this->Payment->alias}.payment_method_id"
                            ]
                        ],
                    ],
                    'order' => ['PaymentMethods.sequence' => 'ASC'],
                    'group' => ['PaymentMethod.name']
                ];
                        
                $this->set('payments', $this->Payment->find('all', $options));
                
                $this->set('startDate', $startDate->format('d/m/Y - H:i'));
                $this->set('finishDate', $finishDate->format('d/m/Y - H:i'));
                
                $this->render('/Reports/print/received_payments');
            }
        } else {

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => __('Reports'),
                    'link' => [
                        'controller' => 'reports',
                        'action' => '/',
                        'params' => []
                    ]
                ],
                1 => [
                    'label' => __('Sales by Period'),
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => $this->params['action'],
                        'params' => []
                    ]
                ]
            ]);
        }
    }

    public function stock_position() {

        $this->set('title', __('Sales by Period'));

        if ($this->request->is('post')) {
            $this->layout = 'pdf';

            if (
                isset($this->request->data['SalesPeriod']) &&
                isset($this->request->data['SalesPeriod']['start_date']) &&
                isset($this->request->data['SalesPeriod']['start_hour']) &&
                isset($this->request->data['SalesPeriod']['finish_date']) &&
                isset($this->request->data['SalesPeriod']['finish_hour'])
            ) {
                $startHour  = $this->request->data['SalesPeriod']['start_hour'];
                $finishHour = $this->request->data['SalesPeriod']['finish_hour'];

                $startDate  = DateTime::createFromFormat('d/m/Y H:i:s', $this->request->data['SalesPeriod']['start_date'] . " {$startHour}:00");
                $finishDate = DateTime::createFromFormat('d/m/Y H:i:s', $this->request->data['SalesPeriod']['finish_date'] . " {$finishHour}:59");

                $this->loadModel('Payment');
                $this->Payment->recursive = 0;
                $options = [
                    'fields' => [
                        'PaymentMethod.name',
                        'SUM(CASE WHEN Payment.subtotal = 0 THEN Payment.payd_value ELSE Payment.subtotal END) AS Total'
                    ],
                    'conditions' => [
                        "{$this->Payment->alias}.created BETWEEN '" . $startDate->format('Y-m-d H:i:s') . "' AND '" . $finishDate->format('Y-m-d H:i:s') . "'"
                    ],
                    'joins' => [
                        [
                            'table' => 'payment_methods',
                            'alias' => 'PaymentMethods',
                            'type' => 'INNER',
                            'conditions' => [
                                "PaymentMethods.id = {$this->Payment->alias}.payment_method_id"
                            ]
                        ],
                    ],
                    'order' => ['PaymentMethods.sequence' => 'ASC'],
                    'group' => ['PaymentMethod.name']
                ];

                $this->set('payments', $this->Payment->find('all', $options));

                $this->set('startDate', $startDate->format('d/m/Y - H:i'));
                $this->set('finishDate', $finishDate->format('d/m/Y - H:i'));

                $this->render('/Reports/print/sales_period');
            }
        } else {

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => __('Reports'),
                    'link' => [
                        'controller' => 'reports',
                        'action' => '/',
                        'params' => []
                    ]
                ],
                1 => [
                    'label' => __('Sales by Period'),
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => $this->params['action'],
                        'params' => []
                    ]
                ]
            ]);
        }
    }

}
