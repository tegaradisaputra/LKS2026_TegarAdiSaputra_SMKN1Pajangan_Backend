<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot function dari Laravel untuk menyuntikkan logic saat model dibuat.
     */
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Memberitahu Eloquent bahwa ID tidak auto-increment.
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Memberitahu Eloquent bahwa tipe ID adalah string.
     */
    public function getKeyType()
    {
        return 'string';
    }
}