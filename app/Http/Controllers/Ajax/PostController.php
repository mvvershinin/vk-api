<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Traits\Clientable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use Clientable;

    public function getPosts($q = 'котики', $start = 0)
    {
        $html = $this->getData($q, $start);

        return response()->json([ 'html' => $html], 200);
    }


}
