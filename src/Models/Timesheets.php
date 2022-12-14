<?php

namespace SaltEmployeeTimesheet\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;

use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

class Timesheets extends Resources {
    use Uuids;
    use ObservableModel;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'employee_id',
        // 'project_id',
        // 'task_id',
        'remark',
        'year',
        'month',
        'date',
        'time',
        'time_start',
        'time_end',
        'type',
    ];

    protected $rules = array(
        'employee_id' => 'required|string',
        // 'project_id' => 'required|string',
        // 'task_id' => 'required|string',
        'remark' => 'nullable|string',
        'year' => 'nullable|date_format:Y',
        'month' => 'nullable|integer|min:1|max:12',
        'date' => 'required|date_format:Y-m-d',
        'time' => 'required|date_format:H:i:s',
        'time_start' => 'nullable|date_format:H:i:s',
        'time_end' => 'nullable|date_format:H:i:s',
        'type' => 'nullable|in:work,overtime',
    );

    protected $auths = array (
        'index',
        'store',
        'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $forms = array();
    protected $structures = array();
    protected $searchable = array(
        'employee_id',
        // 'project_id',
        // 'task_id',
        'remark',
        'year',
        'month',
        'date',
        'time',
        'time_start',
        'time_end',
        'type',
    );

    protected $fillable = array(
        'employee_id',
        // 'project_id',
        // 'task_id',
        'remark',
        'year',
        'month',
        'date',
        'time',
        'time_start',
        'time_end',
        'type',
    );
}
