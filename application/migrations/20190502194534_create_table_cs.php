<?php
class Migration_create_table_cs extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `cs` (
            `id_content` int(11) NOT NULL,
            `id_screen` int(11) NOT NULL,
            `date_publish` date NOT NULL,
            KEY `id_content` (`id_content`),
            KEY `id_screen` (`id_screen`),
            CONSTRAINT `cs_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `cs_ibfk_2` FOREIGN KEY (`id_screen`) REFERENCES `screen` (`id_screen`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `cs`
        ";
        $this->db->query($sql);
    }
}
