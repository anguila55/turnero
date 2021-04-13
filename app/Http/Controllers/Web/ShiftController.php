<?php

namespace App\Http\Controllers\Web;

use App\Constants\TypeUser;
use App\Http\Controllers\Controller;
use App\Repositories\Shift\ShiftRepository;
use Exception;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    protected $model;

    public function __construct(ShiftRepository $shift)
    {
        $this->middleware('auth');
        $this->model = $shift;
    }

    public function index()
    {
        if (auth()->user()->type == TypeUser::ADMIN) {
            return view('shift.index', ['shifts' => $this->model->get()]);
        }
        return view('shift.index', ['shifts' => $this->model->get(auth()->user()->id)]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->model->modify($request->all(), $id);
            return redirect()->back()->with('message', 'Turno modificado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
