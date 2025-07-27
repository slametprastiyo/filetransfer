<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_additional_image_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database library
    }

    /**
     * Inserts data for a new additional image into the 'news_additional_image' table.
     *
     * @param array $data An associative array containing image data:
     * - 'news_id': The ID of the news article this image belongs to.
     * - 'filename_hd': The filename of the high-definition WebP image.
     * - 'filename_thumb': The filename of the thumbnail image.
     * - 'created_at': The Unix timestamp when the image was uploaded.
     * @return bool TRUE on success, FALSE on failure.
     */
    public function insert_additional_image($data) {
        // Insert the data into the 'news_additional_image' table
        // This table should be created in your database with columns:
        // id (INT, Primary Key, Auto-increment)
        // news_id (INT, Foreign Key to news table)
        // filename_hd (VARCHAR)
        // filename_thumb (VARCHAR)
        // created_at (INT)
        return $this->db->insert('news_additional_image', $data);
    }

    /**
     * Retrieves all additional images for a given news article ID.
     *
     * @param int $news_id The ID of the news article.
     * @return array An array of associative arrays, each representing an additional image.
     * Returns an empty array if no images are found.
     */
    public function get_additional_images($news_id) {
        // Select all columns from the 'news_additional_image' table
        $this->db->select('*');
        // Filter by the provided news ID
        $this->db->where('news_id', $news_id);
        // Order by creation time, newest first
        $this->db->order_by('created_at', 'DESC');
        // Execute the query and return the results as an array of objects
        $query = $this->db->get('news_additional_image');
        return $query->result_array(); // Use result_array() to get associative arrays
    }

    /**
     * Deletes an additional image by its ID.
     *
     * @param int $image_id The ID of the additional image to delete.
     * @return bool TRUE on success, FALSE on failure.
     */
    public function delete_additional_image($image_id) {
        $this->db->where('id', $image_id);
        return $this->db->delete('news_additional_image');
    }

    /**
     * Retrieves a single additional image by its ID.
     * Useful for getting file paths before deletion.
     *
     * @param int $image_id The ID of the additional image.
     * @return array|null An associative array of the image data, or null if not found.
     */
    public function get_image_by_id($image_id) {
        $this->db->where('id', $image_id);
        $query = $this->db->get('news_additional_image');
        return $query->row_array(); // Use row_array() for a single result
    }

}
