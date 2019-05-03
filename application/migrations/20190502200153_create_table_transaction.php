<?php
class Migration_create_table_transaction extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `transaction` (
            `id_transaction` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `id_billing` int(11) DEFAULT NULL,
            `method` text NOT NULL,
            `date` varchar(255) NOT NULL,
            `kode` varchar(25) DEFAULT NULL,
            KEY `id_billing` (`id_billing`),
            CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_billing`) REFERENCES `billing` (`id_billing`) ON DELETE CASCADE ON UPDATE CASCADE
          )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `transaction`
        ";
        $this->db->query($sql);
    }
}
