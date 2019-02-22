<?php
class Migration_create_table_content_item extends CI_Migration{
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    // CREATE TABLE `content_item` (
    //     `id_item` int(5) NOT NULL,
    //     `subject` varchar(255) NOT NULL,
    //     `description` varchar(255) NOT NULL,
    //     `tag` varchar(255) NOT NULL,
    //     `date` date NOT NULL,
    //     `image` varchar(255) NOT NULL,
    //     `video` varchar(255) NOT NULL,
    //     `url` varchar(255) NOT NULL,
    //     `status` varchar(255) NOT NULL,
    //     `id_category` int(5) NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    public function up(){
        $this->dbforge->add_field(
            [
                'id_item' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => TRUE
                ],
                'subject' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'description' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'tag' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'date' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'image' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'video' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'url' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'status' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'id_category' => [
                    'type' => 'INT',
                    'constraint' => 5
                ]
            ]
        );
        $this->dbforge->add_key('id_item', TRUE);
        $this->dbforge->add_key('id_category');
        $this->dbforge->create_table('content_item', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('content_item');
    }
}
