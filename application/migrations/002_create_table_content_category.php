<?php
class Migration_create_table_content_category extends CI_Migration{
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    // CREATE TABLE `content_cat` (
    //     `id_category` int(5) NOT NULL,
    //     `name` varchar(255) NOT NULL,
    //     `parent` varchar(255) NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    public function up(){
        $this->dbforge->add_field(
            [
                'id_category' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => TRUE
                ],
                'name' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'parent' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ]
            ]
        );
        $this->dbforge->add_key('id_category', TRUE);
        $this->dbforge->create_table('content_category', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('content_category');
    }
}
