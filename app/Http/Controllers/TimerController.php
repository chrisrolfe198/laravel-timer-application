<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\{TimerRepositoryInterface, GroupRepositoryInterface};
use Carbon\Carbon;

class TimerController extends Controller
{
    protected $timer_repository;

    public function __construct(TimerRepositoryInterface $timer_repository)
    {
        $this->timer_repository = $timer_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $timers = $this->timer_repository->get_all([
            'paginate' => true,
            'user_id' => $request->user()->id
        ]);

        return view('timers.index', ['timers' => $timers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, GroupRepositoryInterface $group_repository)
    {
        $groups = $group_repository->get_all([
            'user_id' => $request->user()->id
        ]);

        return view('timers.form', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->except('_token');

        $fields['user_id'] = $request->user()->id;

        $timer = $this->timer_repository->create($fields);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function stop_timer(Request $request, $id)
    {
        $this->timer_repository->update($id, ['running' => Carbon::now()]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
