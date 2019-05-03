<?php
class Migration_create_table_cl extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `cl` (
            `id_content` int(11) NOT NULL,
            `id_layout` int(11) NOT NULL,
            `position` varchar(255) NOT NULL,
            `id_cl` int(11) NOT NULL,
            KEY `id_content` (`id_content`),
            KEY `id_content_category` (`id_layout`),
            CONSTRAINT `cl_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `cl_ibfk_2` FOREIGN KEY (`id_layout`) REFERENCES `layout` (`id_layout`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `cl`
        ";
        $this->db->query($sql);
    }
}
