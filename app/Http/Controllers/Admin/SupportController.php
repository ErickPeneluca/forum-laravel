<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service)
    {

    }

    //show all

    public function index(Request $request) {
        $supports = $this->service->getAll($request->filter);

        return view('admin/supports/index', [
            'supports' => $supports
        ]);
    }

    // show one
    public function show(string|int $id){
        $support = $this->service-> findOne($id);

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
    public function store(StoreUpdateSupport $r, Support $support){
        $this->service->new(CreateSupportDTO::makeFromRequest($r));

        return redirect()->route('supports.index');
    }

    // view-edit
    public function edit(string $id){

        // $support = $support->where('id',$r->id)->first();

        if ($support =$this->service->findOne($id)) {
            return back();
        }

        if (!$support) {
            return back();
        }

        return view('admin.supports.edit',['support' => $support]);
    }

    // edit-action
    public function update(StoreUpdateSupport $r, Support $support){
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($r)
        );

        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    // delete-action
    public function destroy(string $id){

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
