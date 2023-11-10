<?php
namespace App\Traits;

trait ModelDropdown {

    public static function dropdown(string $key, string $value) {
        return self::all()->map(function ($data) use ($key, $value) {
            return [
                $key => $data->{$key},
                $value => $data->{$value},
            ];
        });
    }

}