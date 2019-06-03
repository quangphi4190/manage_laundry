<?php

namespace Modules\Qlydotkhuyenmai\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlydotkhuyenmai\Entities\Qlydotkhuyenmai;
use Modules\Qlydotkhuyenmai\Http\Requests\CreateQlydotkhuyenmaiRequest;
use Modules\Qlydotkhuyenmai\Http\Requests\UpdateQlydotkhuyenmaiRequest;
use Modules\Qlydotkhuyenmai\Repositories\QlydotkhuyenmaiRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlydotkhuyenmaiController extends AdminBaseController
{
    /**
     * @var QlydotkhuyenmaiRepository
     */
    private $qlydotkhuyenmai;

    public function __construct(QlydotkhuyenmaiRepository $qlydotkhuyenmai)
    {
        parent::__construct();

        $this->qlydotkhuyenmai = $qlydotkhuyenmai;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$qlydotkhuyenmais = $this->qlydotkhuyenmai->all();

        return view('qlydotkhuyenmai::admin.qlydotkhuyenmais.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlydotkhuyenmai::admin.qlydotkhuyenmais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlydotkhuyenmaiRequest $request
     * @return Response
     */
    public function store(CreateQlydotkhuyenmaiRequest $request)
    {
        $this->qlydotkhuyenmai->create($request->all());

        return redirect()->route('admin.qlydotkhuyenmai.qlydotkhuyenmai.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlydotkhuyenmai::qlydotkhuyenmais.title.qlydotkhuyenmais')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlydotkhuyenmai $qlydotkhuyenmai
     * @return Response
     */
    public function edit(Qlydotkhuyenmai $qlydotkhuyenmai)
    {
        return view('qlydotkhuyenmai::admin.qlydotkhuyenmais.edit', compact('qlydotkhuyenmai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlydotkhuyenmai $qlydotkhuyenmai
     * @param  UpdateQlydotkhuyenmaiRequest $request
     * @return Response
     */
    public function update(Qlydotkhuyenmai $qlydotkhuyenmai, UpdateQlydotkhuyenmaiRequest $request)
    {
        $this->qlydotkhuyenmai->update($qlydotkhuyenmai, $request->all());

        return redirect()->route('admin.qlydotkhuyenmai.qlydotkhuyenmai.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlydotkhuyenmai::qlydotkhuyenmais.title.qlydotkhuyenmais')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlydotkhuyenmai $qlydotkhuyenmai
     * @return Response
     */
    public function destroy(Qlydotkhuyenmai $qlydotkhuyenmai)
    {
        $this->qlydotkhuyenmai->destroy($qlydotkhuyenmai);

        return redirect()->route('admin.qlydotkhuyenmai.qlydotkhuyenmai.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlydotkhuyenmai::qlydotkhuyenmais.title.qlydotkhuyenmais')]));
    }
}
