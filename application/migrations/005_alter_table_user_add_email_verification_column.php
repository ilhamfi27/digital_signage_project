<?php
class Migration_alter_table_user_add_email_verification_column extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }
    public function up(){
        $this->dbforge->add_column('users',[
            'verification_code' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE
            ],
            'verification_sent_date' => [
                'type' => 'timestamp',
                'null' => FALSE
            ],
            'verification_accept_date' => [
                'type' => 'timestamp',
                'null' => FALSE
            ]
        ]);
    }

    public function down(){
        $this->dbforge->drop_column('users', 'verification_code');
        $this->dbforge->drop_column('users', 'verification_sent_date');
        $this->dbforge->drop_column('users', 'verification_accept_date');
    }
}
