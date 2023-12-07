<?php
abstract class Model
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = new DatabasePDO();
    }

    abstract public function insert($data, $file = NULL);

    abstract public function update($data);

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_' . $this->table . '=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_' . $this->table . '= :id';
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>