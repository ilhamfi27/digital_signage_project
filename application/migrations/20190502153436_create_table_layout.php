<?php
class Migration_create_table_layout extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up(){
        $this->dbforge->add_field(
            [
                'id_layout' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE,
                    'null' => FALSE
                ],
                'image' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ],
                'position' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ]
            ]
        );
        $this->dbforge->add_key('id_layout', FALSE);
        $this->dbforge->create_table('layout', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('layout');
    }
}
