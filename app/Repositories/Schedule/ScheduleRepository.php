<?php

namespace App\Repositories\Schedule;

use App\Repositories\Base\BaseRepository;
use App\Repositories\Branch\BranchRepository;
use Carbon\Carbon;

class ScheduleRepository extends BaseRepository
{
    protected $model;
    protected $branch;

    public function __construct(Schedule $schedule, BranchRepository $branch)
    {
        $this->model = $schedule;
        $this->branch = $branch;
    }

    public function store(array $data = [])
    {
        return $this->model->create($data);
    }

    public function modify(array $data = [], $id)
    {
        $schedule = $this->findOrFail($id);
        return $schedule->update($data);
    }

    public function del($id)
    {
        $schedule = $this->findOrFail($id);
        return $schedule->delete();
    }

    public function get($branch_id)
    {
        return $this->model->where('branch_id', $branch_id)->get();
    }

    public function available($day)
    {
        $this->model->where('day', $day)->get()->each(function ($item) use (&$count, &$limit) {
            if ($item->lapse) {
                $count += Carbon::createFromFormat('H:i', $item->start)->diffInHours(Carbon::createFromFormat('H:i', $item->end)) * intdiv(60, $item->lapse);
            }
            $limit = $item->cant;
        });
        return ['count' => $count, 'limit' => $limit];
    }

    public function availableHours($branch_id, $day)
    {
        $this->model->where('branch_id', $branch_id)->where('day', $day)->get()->each(function ($item) use (&$schedule) {
            $start = Carbon::createFromFormat('H:i', $item->start);
            $end = Carbon::createFromFormat('H:i', $item->end);
            for ($start; $start < $end; $start->addMinutes($item->lapse)) {
                $schedule[] = $start->format('H:i');
            }
        });
        return $schedule;
    }
}
