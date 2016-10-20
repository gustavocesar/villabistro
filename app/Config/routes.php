<?php

Router::connect('/', array('controller' => 'pages', 'action' => 'home'));

Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/orders_board/*', array('controller' => 'orders', 'action' => 'orders_board'));
Router::connect('/tables_board/*', array('controller' => 'tables', 'action' => 'tables_board'));
Router::connect('/table_details/*', array('controller' => 'tables', 'action' => 'table_details'));
Router::connect('/kitchen_orders/*', array('controller' => 'orders', 'action' => 'kitchen_orders'));
Router::connect('/order_wizard/*', array('controller' => 'orders', 'action' => 'order_wizard'));
Router::connect('/cashier/*', array('controller' => 'cashiers', 'action' => 'cashier'));
Router::connect('/stock_control/*', array('controller' => 'stocks', 'action' => 'stock_control'));
Router::connect('/add_order', array('controller' => 'orders', 'action' => 'add_order'));
Router::connect('/getOrdersByStage/*', array('controller' => 'orders', 'action' => 'getOrdersByStage'));
Router::connect('/documentation', array('controller' => 'pages', 'action' => 'documentation'));
Router::connect('/print_bill', array('controller' => 'pages', 'action' => 'print_bill'));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
