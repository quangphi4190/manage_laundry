<?php

namespace Modules\Qlyuser\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlyuser\Entities\Qlyuser;
use Modules\Qlyuser\Http\Requests\CreateQlyuserRequest;
use Modules\Qlyuser\Http\Requests\UpdateQlyuserRequest;
use Modules\Qlyuser\Repositories\QlyuserRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QlyuserController extends AdminBaseController
{
    /**
     * @var QlyuserRepository
     */
    private $qlyuser;

    public function __construct(QlyuserRepository $qlyuser)
    {
        parent::__construct();

        $this->qlyuser = $qlyuser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$qlyusers = $this->qlyuser->all();

        return view('qlyuser::admin.qlyusers.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('qlyuser::admin.qlyusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlyuserRequest $request
     * @return Response
     */
    public function store(CreateQlyuserRequest $request)
    {
        $this->qlyuser->create($request->all());

        return redirect()->route('admin.qlyuser.qlyuser.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlyuser::qlyusers.title.qlyusers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlyuser $qlyuser
     * @return Response
     */
    public function edit(Qlyuser $qlyuser)
    {
        return view('qlyuser::admin.qlyusers.edit', compact('qlyuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlyuser $qlyuser
     * @param  UpdateQlyuserRequest $request
     * @return Response
     */
    public function update(Qlyuser $qlyuser, UpdateQlyuserRequest $request)
    {
        $this->qlyuser->update($qlyuser, $request->all());

        return redirect()->route('admin.qlyuser.qlyuser.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlyuser::qlyusers.title.qlyusers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlyuser $qlyuser
     * @return Response
     */
    public function destroy(Qlyuser $qlyuser)
    {
        $this->qlyuser->destroy($qlyuser);

        return redirect()->route('admin.qlyuser.qlyuser.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlyuser::qlyusers.title.qlyusers')]));
    }
}
