<?php
class Migration_create_table_history_billing extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }
 public function up() {
        $sql = "
        CREATE TABLE `digital_signage_final`.`history_billing` (
         `id_history_billing` INT(11) NOT NULL AUTO_INCREMENT , 
         `id_billing` INT(11) NOT NULL , 
         `user_id` INT(11) NOT NULL , 
         `id_package` INT(11) NOT NULL ,
         `duration_first` DATE NOT NULL , 
         `duration_last` DATE NOT NULL ,
         `email` VARCHAR(255) NOT NULL , 
         `name` VARCHAR(255) NOT NULL , 
         `status` INT(11) NOT NULL , 
         `date_history` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id_history_billing`)) 
         
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `history_billing`
        ";
        $this->db->query($sql);
    }
}