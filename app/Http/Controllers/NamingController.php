<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Naming;

class NamingController extends Controller
{
    public function create(Request $request, $theme_id) {
        //不正なIDならエラー
        $theme = Theme::where('id', $theme_id)->firstOrFail();
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $naming = new Naming();
        $naming->fill($request->all());
        $naming->user_id = $request->user()->id;
        $naming->theme_id = $theme_id;
        $naming->save();

        return redirect('/mypage');
    }
}
