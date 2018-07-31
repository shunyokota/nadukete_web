<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Naming;

class NamingController extends Controller
{
    public function index(Request $request)
    {
    }
    public function create(Request $request, $theme_id) {
        var_dump($theme_id);
        $theme = Theme::where('id', $theme_id)->firstOrFail();
//        var_dump($theme);
//        exit;
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $naming = new Naming();
        $naming->fill($request->all());
        $naming->user_id = $request->user()->id;
        $naming->theme_id = $theme_id;
//        $naming->associate($request->user());
//        $naming->associate($theme);
        $naming->save();

        return redirect('/mypage');
    }
}
