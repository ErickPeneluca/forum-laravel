<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) {
        $supports = $support->all();

        return view('admin/supports/index', [
            'supports' => $supports
        ]);

    }

    public function create(){
        return view('admin/supports/create');
    }

    public function show(string|int $id){
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        return view('admin/supports/show', [
            'support' => $support
        ]);
    }


    public function store(Request $r, Support $support){
        $data = $r->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }
}
