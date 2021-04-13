<?php

namespace App\Http\Controllers\Web;

use App\Constants\TypeUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\CreateBranchRequest;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\Shift\ShiftRepository;
use Exception;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $model;
    protected $shift;

    public function __construct(BranchRepository $branch, ShiftRepository $shift)
    {
        $this->middleware('auth');
        $this->model = $branch;
        $this->shift = $shift;
    }

    public function index()
    {
        if (auth()->user()->type == TypeUser::ADMIN) {
            return view('branch.index', ['branches' => $this->model->getAll(), 'shifts' => $this->shift->get()]);
        }
        return view('branch.index', ['branches' => $this->model->getAll(auth()->user()->id), 'shifts' => $this->shift->get(auth()->user()->id)]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->model->modify($request->all(), $id);
            return redirect()->back()->with('message', 'Sucursal modificada.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create(CreateBranchRequest $request)
    {
        try {
            $this->model->store($request->all());
            return redirect()->back()->with('message', 'Sucursal creada.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->model->del($id);
            return redirect()->back()->with('message', 'Sucursal eliminada.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
