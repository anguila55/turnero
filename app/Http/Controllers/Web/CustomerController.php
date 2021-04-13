<?php

namespace App\Http\Controllers\Web;

use App\Constants\TypeUser;
use App\Http\Controllers\Controller;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Shift\ShiftRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $model;
    protected $branch;
    protected $shift;

    public function __construct(CustomerRepository $customer, BranchRepository $branch, ShiftRepository $shift)
    {
        $this->middleware('auth')->except('create', 'shift', 'schedule');
        $this->model = $customer;
        $this->branch = $branch;
        $this->shift = $shift;
    }

    public function index()
    {
        if (auth()->user()->type == TypeUser::ADMIN) {
            return view('customer.index', ['customers' => $this->model->get()]);
        }
        return view('customer.index', ['customers' => $this->model->get(auth()->user()->id)]);
    }

    public function create(Request $request)
    {
        try {
            if (($customer = $this->model->exist($request['dni'])) || isset($request['branch_id'])) {
                if (isset($request['branch_id'])) {
                    $customer = $this->model->store($request->all());
                }
                return view('site.terms', ['customer_id' => $customer->id]);
            }
            return view('site.branch', ['customer' => $request->all(), 'branches' => $this->branch->getAll(), 'active' => 1]);
        } catch (Exception $exception) {
            return view('site.error');
        }
    }

    public function schedule(Request $request)
    {
        try {
            $customer = $this->model->find($request->get('customer_id'));
            if (!isset($request['date']) || !$request['date'] || ($request['date'] < Carbon::today()->format('Y-m-d'))) {
                return view('site.calendar', ['customer_id' => $customer->id, 'disable_days' => $this->shift->disableDays($customer), 'active' => 2]);
            }
            return view('site.schedule', ['date' => $request['date'], 'customer_id' => $customer->id, 'branch_id' => $customer->branch_id, 'avalilable_hours' => $this->shift->availableHours($customer, $request->get('date')), 'active' => 3]);
        } catch (Exception $exception) {
            return view('site.error', ['error' => $exception->getMessage()]);
        }
    }

    public function shift(Request $request)
    {
        try {
            $this->shift->store($request->all());
            return view('site.message');
        } catch (Exception $exception) {
            return view('site.error', ['error' => $exception->getMessage()]);
        }
    }

    public function changeStatus($status, $id)
    {
        try {
            $this->model->modifyStatus($status, $id);
            return redirect()->back()->with('message', 'Estado del turno modificado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
