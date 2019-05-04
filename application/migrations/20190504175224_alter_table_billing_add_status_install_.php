<?php
class Migration_alter_table_billing_add_status_install_ extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

      public function up() {
        $this->db->query("ALTER TABLE `billing` ADD `status_install` INT NULL AFTER `status`;");
    }

    public function down() {        
        $this->db->query("ALTER TABLE `billing` DROP `status_install`;");
    }
}
