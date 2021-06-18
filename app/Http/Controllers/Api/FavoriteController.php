<?php

namespace App\Http\Controllers\Api;

use App\Creator;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addFavoriteCreator(Request $request)
    {
        $data = $request->all();
        $userId = $data['user_id'];
        $creatorId = $data['creator_id'];

        $user = User::where("id", "=", $userId)->first();
        $creator = Creator::where("id", "=", $creatorId)->first();

        $flag = true;
        foreach ($user->creators as $creator) {
            if ($creator->id == $creatorId) {
                $flag = false;
            }
        }

        if ($flag) {
            $user->creators()->attach($creatorId);
        } else {
            $user->creators()->detach($creatorId);
        }

        dd('fatto');
    }
}
