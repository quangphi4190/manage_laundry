<?php

namespace Modules\Qlythietbi\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlythietbi\Entities\Qlythietbi;
use Modules\Qlythietbi\Http\Requests\CreateQlythietbiRequest;
use Modules\Qlythietbi\Http\Requests\UpdateQlythietbiRequest;
use Modules\Qlythietbi\Repositories\QlythietbiRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlythietbiController extends AdminBaseController
{
    /**
     * @var QlythietbiRepository
     */
    private $qlythietbi;

    public function __construct(QlythietbiRepository $qlythietbi)
    {
        parent::__construct();

        $this->qlythietbi = $qlythietbi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$qlythietbis = $this->qlythietbi->all();

        return view('qlythietbi::admin.qlythietbis.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlythietbi::admin.qlythietbis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlythietbiRequest $request
     * @return Response
     */
    public function store(CreateQlythietbiRequest $request)
    {
        $this->qlythietbi->create($request->all());

        return redirect()->route('admin.qlythietbi.qlythietbi.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlythietbi::qlythietbis.title.qlythietbis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlythietbi $qlythietbi
     * @return Response
     */
    public function edit(Qlythietbi $qlythietbi)
    {
        return view('qlythietbi::admin.qlythietbis.edit', compact('qlythietbi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlythietbi $qlythietbi
     * @param  UpdateQlythietbiRequest $request
     * @return Response
     */
    public function update(Qlythietbi $qlythietbi, UpdateQlythietbiRequest $request)
    {
        $this->qlythietbi->update($qlythietbi, $request->all());

        return redirect()->route('admin.qlythietbi.qlythietbi.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlythietbi::qlythietbis.title.qlythietbis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlythietbi $qlythietbi
     * @return Response
     */
    public function destroy(Qlythietbi $qlythietbi)
    {
        $this->qlythietbi->destroy($qlythietbi);

        return redirect()->route('admin.qlythietbi.qlythietbi.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlythietbi::qlythietbis.title.qlythietbis')]));
    }
}
