<?php  
class Plugin_model extends CI_Model{
    private $table ="plugins";
    public function __construct(){
        parent::__construct();
    }
    
    public function insert($data){
        $this->db->insert($this->table,$data);
        return $this->db->affected_rows();
    }

    public function delete($where){
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function all(){
        return $this->db->get($this->table);
    }

    public function details($id){
        return $this->db->get_where($this->table,['id_plugin' => $id]);	
    }

    public function full_detail($id){
        $sql = "SELECT 
                    p.`id_plugin` AS id_plugin,
                    `title`,
                    `description`,
                    `rating`,
                    `category_name`,
                    `name` AS creator_name,
                    `photo_icon`,
                    DATE_FORMAT(`uploaded_date`, \"%d %M %Y\") AS uploaded_date
                FROM
                    `plugins` p
                JOIN `creators` c ON c.`id_creator` = p.`id_creator`
                JOIN `categories` ct ON ct.`id_category` = p.`id_category`
                WHERE p.id_plugin = ?";
        return $this->db->query($sql, [$id]);
    }

    public function update($data,$where){
        $this->db->where(['id_plugin' => $where]);
        $this->db->update($this->table,$data);
        return $this->db->affected_rows();
    }

    public function detailed_plugin($id = NULL){
        $sql = "
        SELECT
            p.`id_plugin` AS id_plugin,
            p.`title` AS title,
            p.`description` AS description,
            p.`rating` AS rating,
            c.`name` AS name,
            ct.`category_name` AS category_name,
            c.`email` AS email,
            (
                CASE
                    WHEN a.`id_plugin` IS NOT NULL THEN 'add_on'
                    WHEN t.`id_plugin` IS NOT NULL THEN 'theme'
                END
            ) AS type
        FROM `plugins` p
        LEFT JOIN `creators` c ON c.`id_creator` = p.`id_creator`
        LEFT JOIN `categories` ct ON ct.`id_category` = p.`id_category`
        LEFT JOIN `add_ons` a ON a.`id_plugin` = p.`id_plugin`
        LEFT JOIN `themes` t ON t.`id_plugin` = p.`id_plugin`
        ";
        if ($id == NULL){
            return $this->db->query($sql);
        } else {
            return $this->db->query($sql." WHERE p.`id_plugin` = ?", array($id));
        }

    }

    public function new_last_id(){
        return $this->db->insert_id();
    }
}
