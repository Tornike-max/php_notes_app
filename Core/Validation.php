<?php

namespace Core;


class Validation
{
    public $errors = [];

    public function validation($val, $attributes = [])
    {
        extract($attributes);
        if (strlen($val) < $size) {
            $errors = [
                'body' => [
                    'message' => 'Body needs to be at least 5 characters long'
                ],
            ];
            return $errors;
        } else {
            return true;
        }
    }
}
