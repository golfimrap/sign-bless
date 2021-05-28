<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_surname',
                'method' => static function(string $string, string $separator): string {
                    return strtolower(preg_replace('/[^A-Za-z0-9ก-๙\-]/u', $separator, $string));
                },
            ]
        ];
    }

    public function Bless()
    {
        return $this->belongsTo(Bless::class);
    }
}
