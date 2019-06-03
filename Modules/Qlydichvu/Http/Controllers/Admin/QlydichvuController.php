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
        //$qlydichvus = $this->qlydichvu->all();

        return view('qlydichvu::admin.qlydichvus.index', compact(''));
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
        $this->qlydichvu->create($request->all());

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
        return view('qlydichvu::admin.qlydichvus.edit', compact('qlydichvu'));
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
