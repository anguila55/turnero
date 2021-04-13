<?php

namespace App\Repositories\Shift;

use App\Repositories\Base\BaseRepository;
use App\Repositories\Schedule\ScheduleRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShiftRepository extends BaseRepository
{
    protected $model;
    protected $schedule;

    public function __construct(Shift $shift, ScheduleRepository $schedule)
    {
        $this->model = $shift;
        $this->schedule = $schedule;
    }

    private function busyShift($customer_id, $branch_id, $date)
    {
        if ($this->model->where('customer_id', $customer_id)->where('branch_id', $branch_id)->where('date', $date)->count()) {
            throw new Exception('La fecha ' . Carbon::make($date)->format('d-m') . ' no esta disponible!');
        }
    }

    public function store(array $data = [])
    {
        $data['date'] = $date = $data['date'] . ' ' . $data['hour'];
        $this->busyShift($data['customer_id'], $data['branch_id'], $data['date']);
        $shift = $this->model->create($data);
        if ($shift) {
            $customer = $shift->customer()->first();
            $branch = $shift->branch()->first()->user()->first();
            return $this->sendMail($customer, $branch, Carbon::make($data['date'])->format('H:i d/m'));
        }
        throw new Exception('El turno no pudo ser generado, intente nuevamente!');
    }

    public function modify(array $data = [], $id)
    {
        $shift = $this->findOrFail($id);
        return $shift->update($data);
    }

    public function get($user_id = null)
    {
        $query = $this->model->with('branch.user', 'customer');
        if ($user_id) {
            $branch_id = DB::table('branches')->where('user_id', $user_id)->first()->id;
            return $query->where('branch_id', $branch_id)->get();
        }
        return $query->get();
    }

    public function disableDays($customer)
    {
        $today = Carbon::today();
        $disable = [];
        for ($first_day = $today->firstOfMonth(); $first_day < Carbon::today(); $first_day->addDay()) {
            $disable[] = str_replace('-0', '-', $first_day->format('Y-m-d'));
        }
        $this->model->where('branch_id', $customer->branch_id)->whereDate('date', '>=', Carbon::today()->format('Y-m-d'))->get()->groupBy(function ($day) {
            return Carbon::make($day->date)->format('Y-m-d');
        })->each(function ($item) use (&$disable, $customer) {
            $restriction = $this->schedule->available(Carbon::make($item[0]->date)->dayOfWeek);
            if ($item->count() >= $restriction['count'] || $item->where('customer_id', $customer->id)->count() >= $restriction['limit']) {
                $disable[] = str_replace('-0', '-', Carbon::make($item[0]->date)->format('Y-m-d'));
            }
        });
        return $disable;
    }

    public function availableHours($customer, $date)
    {
        $shift = [];
        $schedule = $this->schedule->availableHours($customer->branch_id, Carbon::make($date)->dayOfWeek);
        $this->model->select('date')->whereDate('date', $date)->where('branch_id', $customer->branch_id)->get()->each(function ($item) use (&$shift) {
            $shift[] = Carbon::make($item->date)->format('H:i');
        });
        if (!$schedule) {
            throw new Exception('La fecha ' . Carbon::make($date)->format('d-m') . ' no esta disponible!');
        }
        return array_diff($schedule, $shift);
    }

    private function sendMail($customer, $branch, $date)
    {
        return Mail::send([], [], function ($message) use ($customer, $branch, $date) {
            $message->to($customer->email, $customer->name)
                ->bcc($branch->email, $branch->name)
                ->subject('Turno Confirmado')
                ->from(env('MAIL_FROM'), env('MAIL_NAME'))
                ->setBody('Horario ' . $date . ' en ' . $branch->name);
        });
    }
}
