<?php

namespace Modules\Qlygoithang\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlygoithang\Entities\Qlygoithang;
use Modules\Qlygoithang\Http\Requests\CreateQlygoithangRequest;
use Modules\Qlygoithang\Http\Requests\UpdateQlygoithangRequest;
use Modules\Qlygoithang\Repositories\QlygoithangRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlygoithangController extends AdminBaseController
{
    /**
     * @var QlygoithangRepository
     */
    private $qlygoithang;

    public function __construct(QlygoithangRepository $qlygoithang)
    {
        parent::__construct();

        $this->qlygoithang = $qlygoithang;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$qlygoithangs = $this->qlygoithang->all();

        return view('qlygoithang::admin.qlygoithangs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlygoithang::admin.qlygoithangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlygoithangRequest $request
     * @return Response
     */
    public function store(CreateQlygoithangRequest $request)
    {
        $this->qlygoithang->create($request->all());

        return redirect()->route('admin.qlygoithang.qlygoithang.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlygoithang::qlygoithangs.title.qlygoithangs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlygoithang $qlygoithang
     * @return Response
     */
    public function edit(Qlygoithang $qlygoithang)
    {
        return view('qlygoithang::admin.qlygoithangs.edit', compact('qlygoithang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlygoithang $qlygoithang
     * @param  UpdateQlygoithangRequest $request
     * @return Response
     */
    public function update(Qlygoithang $qlygoithang, UpdateQlygoithangRequest $request)
    {
        $this->qlygoithang->update($qlygoithang, $request->all());

        return redirect()->route('admin.qlygoithang.qlygoithang.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlygoithang::qlygoithangs.title.qlygoithangs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlygoithang $qlygoithang
     * @return Response
     */
    public function destroy(Qlygoithang $qlygoithang)
    {
        $this->qlygoithang->destroy($qlygoithang);

        return redirect()->route('admin.qlygoithang.qlygoithang.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlygoithang::qlygoithangs.title.qlygoithangs')]));
    }
}
