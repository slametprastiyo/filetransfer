<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller_model class
 *
 * This model handles database operations for the 'controller' table.
 * It provides functions for retrieving, inserting, updating, and deleting controller data.
 */
class Controller_model extends CI_Model {

    // Table name
    private $table = 'controller';

    /**
     * Constructor
     *
     * Loads the database library.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all controllers
     *
     * Retrieves all records from the 'controller' table.
     *
     * @return array An array of controller arrays.
     */
    public function get_all_controllers()
    {
        // Select all columns from the 'controller' table
        $query = $this->db->get($this->table);
        // Return the result as an array of arrays
        return $query->result_array();
    }

    /**
     * Get controller by ID
     *
     * Retrieves a single record from the 'controller' table based on its ID.
     *
     * @param int $id The ID of the controller to retrieve.
     * @return array|null The controller array if found, otherwise null.
     */
    public function get_controller_by_id($id)
    {
        // Where clause to filter by 'id'
        $this->db->where('id', $id);
        // Get a single row from the 'controller' table
        $query = $this->db->get($this->table);
        // Return the single row as an array
        return $query->row_array();
    }

    /**
     * Insert a new controller
     *
     * Inserts a new record into the 'controller' table.
     *
     * @param array $data An associative array of data to insert (e.g., ['name' => 'HomeController']).
     * @return bool True on success, false on failure.
     */
    public function insert_controller($data)
    {
        // Insert data into the 'controller' table
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update a controller
     *
     * Updates an existing record in the 'controller' table based on its ID.
     *
     * @param int $id The ID of the controller to update.
     * @param array $data An associative array of data to update.
     * @return bool True on success, false on failure.
     */
    public function update_controller($id, $data)
    {
        // Where clause to identify the record to update
        $this->db->where('id', $id);
        // Update data in the 'controller' table
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete a controller
     *
     * Deletes a record from the 'controller' table based on its ID.
     *
     * @param int $id The ID of the controller to delete.
     * @return bool True on success, false on failure.
     */
    public function delete_controller($id)
    {
        // Where clause to identify the record to delete
        $this->db->where('id', $id);
        // Delete the record from the 'controller' table
        return $this->db->delete($this->table);
    }
}
