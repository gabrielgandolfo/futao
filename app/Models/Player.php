<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $levels = array(
        1 => "1 - Bagre",
        2 => "2 - Ruim",
        3 => "3 - Regular",
        4 => "4 - Bom",
        5 => "5 - Craque"
    );

    protected $default = array(
        0 => "Não",
        1 => "Sim"
    );

    protected function casts(): array
    {
        return [
            'level' => 'integer',
            'goalkeeper' => 'boolean',
            'confirmed' => 'boolean',
        ];
    }

    protected function level(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->levels[$value],
        );
    }

    protected function goalkeeper(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->default[$value],
        );
    }

    protected function confirmed(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->default[$value],
        );
    }
}
