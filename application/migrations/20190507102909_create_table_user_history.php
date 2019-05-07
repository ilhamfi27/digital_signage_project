<?php
class Migration_create_table_user_history extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $this->db->query(
            "CREATE TABLE `user_history`(  
                `id_history` INT(11) NOT NULL AUTO_INCREMENT,
                `user_id` INT(11) NOT NULL,
                `first_name` VARCHAR(30) NOT NULL,
                `last_name` VARCHAR(30) NOT NULL,
                `birth_date` DATE NOT NULL,
                `gender` CHAR(1),
                `avatar` VARCHAR(255) NOT NULL,
                `username` VARCHAR(30) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                PRIMARY KEY (`id_history`)
              )
              "
        );
    }

    public function down() {
        $this->db->query(
            "DROP table `user_history`"
        );
    }
}
