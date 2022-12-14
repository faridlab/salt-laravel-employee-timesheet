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

class TimesheetApprovals extends Resources {
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
        'approver_id',
        'year',
        'month',
        'remark',
        'total_time',
        'status',
        'data',
    ];

    protected $rules = array(
        'employee_id' => 'required|string',
        'approver_id' => 'nullable|string',

        'year' => 'required|date_format:Y',
        'month' => 'required|integer|min:1|max:12',
        'remark' => 'required|string',
        'billable_time' => 'required|date_format:H:i:s',
        'billable_cost' => 'required|float',

        'status' => 'nullable|in:approved,pending,active',
        'data' => 'nullable|json',
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
        'approver_id',
        'year',
        'month',
        'remark',
        'total_time',
        'status',
        'data',
    );

    protected $fillable = array(
        'employee_id',
        'approver_id',
        'year',
        'month',
        'remark',
        'total_time',
        'status',
        'data',
    );
}
