<?php
class Migration_create_table_users extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up(){
        $this->dbforge->add_field(
            [
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE,
                    'null' => FALSE
                ],
                'username' => [
                    'type' => 'varchar',
                    'constraint' => 30,
                    'null' => FALSE
                ],
                'email' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                    'null' => FALSE
                ],
                'password' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                    'null' => FALSE
                ]
            ]
        );
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('users', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('users');
    }
}
