<?php
class Migration_create_table_history_content extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

  public function up() {
        $sql = "
        CREATE TABLE `digital_signage_final`.`history_content` ( 
        `id_history_content` INT(11) NOT NULL AUTO_INCREMENT ,
        `id_content` INT(11) NOT NULL , 
        `id_content_category` INT(11) NOT NULL , 
        `description` VARCHAR(255) NOT NULL , 
        `date` DATE NOT NULL , 
        `subject` VARCHAR(255) NOT NULL , 
        `file` VARCHAR(255) NOT NULL , 
        `user_id` INT(11) NOT NULL , 
        `date_history` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id_history_content`))
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `history_content`
        ";
        $this->db->query($sql);
    }
}