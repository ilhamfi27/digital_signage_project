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
                    'constraint' => 5,
                    'auto_increment' => TRUE
                ],
                'username' => [
                    'type' => 'varchar',
                    'constraint' => 30
                ],
                'email' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'password' => [
                    'type' => 'INT',
                    'constraint' => 255
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
