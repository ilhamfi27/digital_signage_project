<?php
class Migration_alter_table_punya_ade extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $this->db->query("ALTER TABLE `billing` DROP FOREIGN KEY `billing_ibfk_1`");
        $this->db->query("ALTER TABLE `billing` ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`id_package`) REFERENCES `add_ons`(`id_plugin`) ON DELETE CASCADE ON UPDATE CASCADE");
    }

    public function down() {        
        $this->db->query("ALTER TABLE `billing` DROP FOREIGN KEY `billing_ibfk_1`");
        $this->db->query("ALTER TABLE `billing` ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`id_package`) REFERENCES `package`(`id_package`) ON DELETE CASCADE ON UPDATE CASCADE");
    }
}
