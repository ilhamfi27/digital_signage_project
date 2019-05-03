<?php
class Migration_create_table_plugins extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `plugins` (
            `id_plugin` int(11) NOT NULL AUTO_INCREMENT,
            `uploaded_date` datetime NOT NULL,
            `updated_date` datetime DEFAULT NULL,
            `title` varchar(255) NOT NULL,
            `description` text NOT NULL,
            `rating` float(2,1) NOT NULL DEFAULT '0.0',
            `photo_icon` varchar(255) NOT NULL,
            `id_creator` int(11) DEFAULT NULL,
            `id_category` int(11) DEFAULT NULL,
            PRIMARY KEY (`id_plugin`),
            KEY `id_creator` (`id_creator`),
            KEY `id_category` (`id_category`),
            CONSTRAINT `plugins_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `plugins_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `plugins`
        ";
        $this->db->query($sql);
    }
}
