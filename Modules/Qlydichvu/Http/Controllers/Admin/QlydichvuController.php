<?php

namespace Modules\Qlydichvu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlydichvu\Entities\Qlydichvu;
use Modules\Qlydichvu\Http\Requests\CreateQlydichvuRequest;
use Modules\Qlydichvu\Http\Requests\UpdateQlydichvuRequest;
use Modules\Qlydichvu\Repositories\QlydichvuRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlydichvuController extends AdminBaseController
{
    /**
     * @var QlydichvuRepository
     */
    private $qlydichvu;

    public function __construct(QlydichvuRepository $qlydichvu)
    {
        parent::__construct();

        $this->qlydichvu = $qlydichvu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qlydichvus = $this->qlydichvu->all();

        return view('qlydichvu::admin.qlydichvus.index', compact('qlydichvus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlydichvu::admin.qlydichvus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlydichvuRequest $request
     * @return Response
     */
    public function store(CreateQlydichvuRequest $request)
    {
        //$this->qlydichvu->create($request->all());
        $qlydichvu = new Qlydichvu();
        $qlydichvu->name = $request['name'] ? $request['name'] :'';
        $qlydichvu->type = $request['type'] ? $request['type'] :'';
        $qlydichvu->code = $request['code']? $request['code'] :'';
        $qlydichvu->note = $request['note']? $request['note'] :'';
        $qlydichvu->price = $request['price']? $request['price'] :'';
        $qlydichvu->status = 1;
        $qlydichvu->save();
        return redirect()->route('admin.qlydichvu.qlydichvu.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlydichvu::qlydichvus.title.qlydichvus')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlydichvu $qlydichvu
     * @return Response
     */
    public function edit(Qlydichvu $qlydichvu)
    {
        $type = $qlydichvu->type;
        return view('qlydichvu::admin.qlydichvus.edit', compact('qlydichvu','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlydichvu $qlydichvu
     * @param  UpdateQlydichvuRequest $request
     * @return Response
     */
    public function update(Qlydichvu $qlydichvu, UpdateQlydichvuRequest $request)
    {
        $this->qlydichvu->update($qlydichvu, $request->all());

        return redirect()->route('admin.qlydichvu.qlydichvu.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlydichvu::qlydichvus.title.qlydichvus')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlydichvu $qlydichvu
     * @return Response
     */
    public function destroy(Qlydichvu $qlydichvu)
    {
        $this->qlydichvu->destroy($qlydichvu);

        return redirect()->route('admin.qlydichvu.qlydichvu.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlydichvu::qlydichvus.title.qlydichvus')]));
    }
}
