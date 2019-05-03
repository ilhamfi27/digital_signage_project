<?php
class Migration_create_table_billing extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `billing` (
            `id_billing` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `user_id` int(11) DEFAULT NULL,
            `id_package` int(11) NOT NULL,
            `duration_first` date DEFAULT NULL,
            `duration_last` date DEFAULT NULL,
            `email` varchar(255) NOT NULL,
            `name` varchar(255) NOT NULL,
            `status` int(2) DEFAULT NULL,
            KEY `id_package` (`id_package`),
            KEY `user_id` (`user_id`),
            CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`id_package`) REFERENCES `package` (`id_package`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `billing`
        ";
        $this->db->query($sql);
    }
}
