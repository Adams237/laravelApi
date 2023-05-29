<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserCtr extends Controller
{
    //
    public function register(Request $request)
    {
        var_dump('ici');
        $data = $request->all();
        try {
            $user = new User;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $status = true;
            response()->json([$user, $status]);
        } catch (Exception $e) {
           $status = false;
           response()->json([$e, $status]);
        }
    }

    public function test() {
        var_dump('ici');
        return response()->json("test");
    }
}
