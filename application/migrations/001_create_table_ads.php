<?php
class Migration_create_table_ads extends CI_Migration{
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    // CREATE TABLE `ads` (
    //     `id_ads` int(5) NOT NULL,
    //     `subject` varchar(255) NOT NULL,
    //     `video` varchar(255) NOT NULL,
    //     `image` varchar(255) NOT NULL,
    //     `url` varchar(255) NOT NULL,
    //     `description` varchar(255) NOT NULL,
    //     `user` varchar(255) NOT NULL,
    //     `status` varchar(255) NOT NULL,
    //     `user_id` int(5) NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    public function up(){
        $this->dbforge->add_field(
            [
                'id_ads' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => TRUE
                ], 
                'subject' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'video' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'image' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'url' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'description' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'user' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'status' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ], 
                'user_id' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ]
            ]
        );
        $this->dbforge->add_key('id_ads', TRUE);
        $this->dbforge->create_table('ads', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('ads');
    }
}
