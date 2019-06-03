<?php

namespace Modules\Qlyloaiquanao\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlyloaiquanao\Entities\Qlyloaiquanao;
use Modules\Qlyloaiquanao\Http\Requests\CreateQlyloaiquanaoRequest;
use Modules\Qlyloaiquanao\Http\Requests\UpdateQlyloaiquanaoRequest;
use Modules\Qlyloaiquanao\Repositories\QlyloaiquanaoRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlyloaiquanaoController extends AdminBaseController
{
    /**
     * @var QlyloaiquanaoRepository
     */
    private $qlyloaiquanao;

    public function __construct(QlyloaiquanaoRepository $qlyloaiquanao)
    {
        parent::__construct();

        $this->qlyloaiquanao = $qlyloaiquanao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$qlyloaiquanaos = $this->qlyloaiquanao->all();

        return view('qlyloaiquanao::admin.qlyloaiquanaos.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlyloaiquanao::admin.qlyloaiquanaos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlyloaiquanaoRequest $request
     * @return Response
     */
    public function store(CreateQlyloaiquanaoRequest $request)
    {
        $this->qlyloaiquanao->create($request->all());

        return redirect()->route('admin.qlyloaiquanao.qlyloaiquanao.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlyloaiquanao::qlyloaiquanaos.title.qlyloaiquanaos')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlyloaiquanao $qlyloaiquanao
     * @return Response
     */
    public function edit(Qlyloaiquanao $qlyloaiquanao)
    {
        return view('qlyloaiquanao::admin.qlyloaiquanaos.edit', compact('qlyloaiquanao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlyloaiquanao $qlyloaiquanao
     * @param  UpdateQlyloaiquanaoRequest $request
     * @return Response
     */
    public function update(Qlyloaiquanao $qlyloaiquanao, UpdateQlyloaiquanaoRequest $request)
    {
        $this->qlyloaiquanao->update($qlyloaiquanao, $request->all());

        return redirect()->route('admin.qlyloaiquanao.qlyloaiquanao.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlyloaiquanao::qlyloaiquanaos.title.qlyloaiquanaos')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlyloaiquanao $qlyloaiquanao
     * @return Response
     */
    public function destroy(Qlyloaiquanao $qlyloaiquanao)
    {
        $this->qlyloaiquanao->destroy($qlyloaiquanao);

        return redirect()->route('admin.qlyloaiquanao.qlyloaiquanao.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlyloaiquanao::qlyloaiquanaos.title.qlyloaiquanaos')]));
    }
}
