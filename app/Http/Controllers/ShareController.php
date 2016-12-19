<?php

namespace App\Http\Controllers;

use Share;

class ShareController
{
    public function share($url, $nama)
    {
        $share = Share::load($url, $nama)->services('facebook', 'gplus', 'twitter');
        return $share;
    }
}
