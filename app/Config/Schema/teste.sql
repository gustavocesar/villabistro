delete from bills where id < 500;
delete from orders where id < 500;

INSERT INTO `bills` (`id`, `status_bill_id`, `table_id`, `identifier`, `created`, `modified`) VALUES
(1, 1, 2, 'I', '2017-03-02 12:48:01', '2017-03-02 12:48:01');

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `stage_id`, `table_id`, `bill_id`, `status_order_id`, `payment_id`, `observation`, `kitchen_order`, `created`, `modified`) VALUES
(1, 1, 40, 1.00, 2, 2, 1, 1, NULL, '', 0, '2017-03-02 12:48:01', '2017-03-02 12:48:01'),
(3, 1, 41, 1.00, 2, 2, 1, 1, NULL, '', 0, '2017-03-02 12:48:01', '2017-03-02 12:48:01'),
(4, 1, 41, 1.00, 2, 2, 1, 1, NULL, '', 0, '2017-03-02 12:48:01', '2017-03-02 12:48:01'),
(6, 1, 42, 1.00, 2, 2, 1, 1, NULL, '', 0, '2017-03-02 12:48:01', '2017-03-02 12:48:01'),
(7, 1, 42, 1.00, 2, 2, 1, 1, NULL, '', 0, '2017-03-02 12:48:01', '2017-03-02 12:48:01'),
(8, 1, 42, 1.00, 2, 2, 1, 1, NULL, '', 0, '2017-03-02 12:48:01', '2017-03-02 12:48:01');

