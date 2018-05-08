<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show(Link $link)
    {
        return redirect()->away(
            $link->getUrl(request('hash'))
        );
    }

    public function store(Link $link)
    {
        $this->validate(request(), [
            'url' =>  'required'
        ]);

        $url = (request('url')) ? (parse_url(request('url'), PHP_URL_SCHEME) ? '' : 'http://') . request('url') : '';
        $hash = str_random(4);

        $linker = new Link;
        $linker->addLink(
            compact('url', 'hash')
        );

        return redirect()->route('home')->with('hash', $hash);
    }
}
