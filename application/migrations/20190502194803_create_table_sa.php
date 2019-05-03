<?php
class Migration_create_table_sa extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `sa` (
            `id_screen` int(11) NOT NULL,
            `id_ads` int(11) NOT NULL,
            KEY `id_screen` (`id_screen`),
            KEY `id_ads` (`id_ads`),
            CONSTRAINT `sa_ibfk_1` FOREIGN KEY (`id_screen`) REFERENCES `screen` (`id_screen`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `sa_ibfk_2` FOREIGN KEY (`id_ads`) REFERENCES `ads` (`id_ads`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `sa`
        ";
        $this->db->query($sql);
    }
}
