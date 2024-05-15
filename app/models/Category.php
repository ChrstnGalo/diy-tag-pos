<?php

/**
 * category class
 */
class Category extends Model
{
    protected $table = "category";

    protected $allowed_columns = [
        'category_name'
    ];

    public function validate($data, $id = null)
    {
        $errors = [];

        // Check category
        if (empty($data['category_name'])) {
            $errors['category_name'] = "category_name is required";
        } elseif (!preg_match('/^[a-zA-Z ]+$/', $data['category_name'])) {
            $errors['category_name'] = "Only letters allowed in category_name";
        }

        return $errors;
    }
}
