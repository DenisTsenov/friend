<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FriendsController extends Controller {

    /**
     * Display a listing of friends.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $friends = DB::table('friends')->where([
            ['friends.status', '=', '0'],
            ['friends.fr1', '=', '1']
        ]);

        $users = DB::table('users')
                ->joinSub($friends, 'friend', function($join) {
                    $join->on('users.user_id', '=', 'friend.fr2');
                })
                ->join('lang_table', function ($join) {
                    $join->on('users.country', '=', 'lang_table.language_id')
                    ->where('users.country', '=', '1');
                })
                ->paginate(25);

        return view('friends', compact('users'))->render();
    }

}
