<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $fillable = ['url', 'hash'];

    public function addLink(array $link)
    {
        return Link::create([
            'url' => $link['url'],
            'hash' => $link['hash'],
        ]);
    }
}
