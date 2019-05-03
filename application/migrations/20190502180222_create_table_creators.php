<?php
class Migration_create_table_creators extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `creators` (
            `id_creator` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `address` text NOT NULL,
            `image` varchar(255) NOT NULL,
            `place_of_birth` varchar(255) NOT NULL,
            `date_of_birth` date NOT NULL,
            `gender` varchar(255) NOT NULL,
            `religion` varchar(255) NOT NULL,
            `citizenship` varchar(255) NOT NULL,
            `blood_group` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `phone_number` varchar(255) NOT NULL,
            `made` varchar(255) NOT NULL,
            PRIMARY KEY (`id_creator`)
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `creators`
        ";
        $this->db->query($sql);
    }
}
