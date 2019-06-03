<?php

namespace Modules\Qlythuebaocuakhach\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlythuebaocuakhach\Entities\Qlythuebaocuakhach;
use Modules\Qlythuebaocuakhach\Http\Requests\CreateQlythuebaocuakhachRequest;
use Modules\Qlythuebaocuakhach\Http\Requests\UpdateQlythuebaocuakhachRequest;
use Modules\Qlythuebaocuakhach\Repositories\QlythuebaocuakhachRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlythuebaocuakhachController extends AdminBaseController
{
    /**
     * @var QlythuebaocuakhachRepository
     */
    private $qlythuebaocuakhach;

    public function __construct(QlythuebaocuakhachRepository $qlythuebaocuakhach)
    {
        parent::__construct();

        $this->qlythuebaocuakhach = $qlythuebaocuakhach;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$qlythuebaocuakhaches = $this->qlythuebaocuakhach->all();

        return view('qlythuebaocuakhach::admin.qlythuebaocuakhaches.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlythuebaocuakhach::admin.qlythuebaocuakhaches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlythuebaocuakhachRequest $request
     * @return Response
     */
    public function store(CreateQlythuebaocuakhachRequest $request)
    {
        $this->qlythuebaocuakhach->create($request->all());

        return redirect()->route('admin.qlythuebaocuakhach.qlythuebaocuakhach.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlythuebaocuakhach::qlythuebaocuakhaches.title.qlythuebaocuakhaches')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlythuebaocuakhach $qlythuebaocuakhach
     * @return Response
     */
    public function edit(Qlythuebaocuakhach $qlythuebaocuakhach)
    {
        return view('qlythuebaocuakhach::admin.qlythuebaocuakhaches.edit', compact('qlythuebaocuakhach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlythuebaocuakhach $qlythuebaocuakhach
     * @param  UpdateQlythuebaocuakhachRequest $request
     * @return Response
     */
    public function update(Qlythuebaocuakhach $qlythuebaocuakhach, UpdateQlythuebaocuakhachRequest $request)
    {
        $this->qlythuebaocuakhach->update($qlythuebaocuakhach, $request->all());

        return redirect()->route('admin.qlythuebaocuakhach.qlythuebaocuakhach.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlythuebaocuakhach::qlythuebaocuakhaches.title.qlythuebaocuakhaches')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlythuebaocuakhach $qlythuebaocuakhach
     * @return Response
     */
    public function destroy(Qlythuebaocuakhach $qlythuebaocuakhach)
    {
        $this->qlythuebaocuakhach->destroy($qlythuebaocuakhach);

        return redirect()->route('admin.qlythuebaocuakhach.qlythuebaocuakhach.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlythuebaocuakhach::qlythuebaocuakhaches.title.qlythuebaocuakhaches')]));
    }
}
