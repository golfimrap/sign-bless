<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Bless extends Model
{
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_name',
                'method' => static function(string $string, string $separator): string {
                    return strtolower(preg_replace('/[^A-Za-z0-9ก-๙\-]/u', $separator, $string));
                },
            ]
        ];
    }

    public function Signature()
    {
        return $this->hasMany(Signature::class);
    }
}
