<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Schedule\ScheduleRepository;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $model;

    public function __construct(ScheduleRepository $schedule)
    {
        $this->middleware('auth');
        $this->model = $schedule;
    }

    public function index($branch_id)
    {
        return view('schedule.index', ['schedules' => $this->model->get($branch_id), 'branch_id' => $branch_id]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->model->modify($request->all(), $id);
            return redirect()->back()->with('message', 'Horario modificado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $this->model->store($request->all());
            return redirect()->back()->with('message', 'Horario creado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->model->del($id);
            return redirect()->back()->with('message', 'Horario eliminado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
