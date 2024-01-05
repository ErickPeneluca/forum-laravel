<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    //show all

    public function index(Support $support) {
        $supports = $support->all();

        return view('admin/supports/index', [
            'supports' => $supports
        ]);

    }

    // show one
    public function show(string|int $id){
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        return view('admin/supports/show', [
            'support' => $support
        ]);
    }

    // create-page-view
    public function create(){
        return view('admin/supports/create');
    }


    // action
    public function store(Request $r, Support $support){
        $data = $r->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    // view-edit
    public function edit(Request $r,Support $support){

        $support = $support->where('id',$r->id)->first();

        if (!$support) {
            return back();
        }

        return view('admin.supports.edit',['support' => $support]);
    }

    // edit-action
    public function update(Request $r, Support $support){
        $support = $support->find($r->id);

        if (!$support) {
            return back();
        }

        $support->subject = $r->subject;
        $support->body = $r->body;

        $support->save();

        return redirect()->route('supports.index');
    }

    // delete-action
    public function destroy(Request $r, Support $support){
        $support = $support->find($r->id);

        if (!$support) {
            return back();
        }

        $support->delete();
        return redirect()->route('supports.index');
    }
}
