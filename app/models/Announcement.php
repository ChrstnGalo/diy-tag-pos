<?php

/**
 * announcement class
 */
class Announcement extends Model
{
    protected $table = "announcement";

    protected $allowed_columns = [
        'title',
        'body'
    ];

    public function validate($data, $id = null)
    {
        $errors = [];

        // Check title
        if (empty($data['title'])) {
            $errors['title'] = "Title is required";
        }

        // Check body
        if (empty($data['body'])) {
            $errors['body'] = "Body is required";
        }

        return $errors;
    }

    public function update($id, $data)
    {
        $columns = array_intersect_key($data, array_flip($this->allowed_columns));
        $set = "";
        foreach ($columns as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');

        $sql = "UPDATE {$this->table} SET $set WHERE id = :id";
        $columns['id'] = $id;

        return $this->query($sql, $columns);
    }
}
