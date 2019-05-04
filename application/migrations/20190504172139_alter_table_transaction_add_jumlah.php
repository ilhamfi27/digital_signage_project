<?php
class Migration_alter_table_transaction_add_jumlah extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $this->db->query("ALTER TABLE `transaction` ADD `jumlah` INT NULL AFTER `kode`");
    }

    public function down() {        
        $this->db->query("ALTER TABLE `transaction` DROP `jumlah`");
    }
}
