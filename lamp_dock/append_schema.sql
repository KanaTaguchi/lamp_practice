CREATE TABLE `histories` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  primary key(order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `details` (
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;