<?php
class Migration_create_table_package extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `package` (
            `id_package` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `price` int(11) NOT NULL
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `package`
        ";
        $this->db->query($sql);
    }
}
