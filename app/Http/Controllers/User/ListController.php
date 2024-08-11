<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ListController extends Controller
{
    public function getList()
    {

        return response()->json([
           'users' => User::all(),
        ], 200);

    }
}
