<?php

namespace Modules\Qlytiems\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Qlytiems\Entities\Qlytiems;
use Modules\Qlytiems\Http\Requests\CreateQlytiemsRequest;
use Modules\Qlytiems\Http\Requests\UpdateQlytiemsRequest;
use Modules\Qlytiems\Repositories\QlytiemsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Customers\Entities\Customer;
use DB;

class QlytiemsController extends AdminBaseController
{
    /**
     * @var QlytiemsRepository
     */
    private $qlytiems;
    public function __construct(QlytiemsRepository $qlytiems)
    {
        parent::__construct();        
        $this->qlytiems = $qlytiems;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qlytiems = $this->qlytiems->all();
        $qlytiems = Qlytiems::select('qlytiems__qlytiems.*','users.last_name','users.first_name' )       
        ->leftjoin('users', 'users.id', '=', 'qlytiems__qlytiems.user_id')->get();
        return view('qlytiems::admin.qlytiems.index', compact('qlytiems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
        return view('qlytiems::admin.qlytiems.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQlytiemsRequest $request
     * @return Response
     */
    public function store(CreateQlytiemsRequest $request)
    {
        $this->qlytiems->create($request->all());

        return redirect()->route('admin.qlytiems.qlytiems.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('qlytiems::qlytiems.title.qlytiems')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qlytiems $qlytiems
     * @return Response
     */
    public function edit(Qlytiems $qlytiems)
    {
        $user_id = $qlytiems->user_id ? $qlytiems->user_id : '' ;
        $users = DB::table('users')->get();
        return view('qlytiems::admin.qlytiems.edit', compact('qlytiems','users','user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qlytiems $qlytiems
     * @param  UpdateQlytiemsRequest $request
     * @return Response
     */
    public function update(Qlytiems $qlytiems, UpdateQlytiemsRequest $request)
    {
        $this->qlytiems->update($qlytiems, $request->all());

        return redirect()->route('admin.qlytiems.qlytiems.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('qlytiems::qlytiems.title.qlytiems')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qlytiems $qlytiems
     * @return Response
     */
    public function destroy(Qlytiems $qlytiems)
    {
        $this->qlytiems->destroy($qlytiems);

        return redirect()->route('admin.qlytiems.qlytiems.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('qlytiems::qlytiems.title.qlytiems')]));
    }
}
