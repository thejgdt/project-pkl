<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $tables = DB::select('SHOW TABLES');

        $tableNames = array_map('current', $tables);

        $excludedTables = ['cache', 'cache_locks', 'failed_jobs', 'jobs', 'job_batches', 'migrations', 'password_reset_tokens', 'sessions'];

        $filteredTables = array_filter($tableNames, function ($table) use ($excludedTables) {
            return !in_array($table, $excludedTables);
        });

        $tableData = [];
        foreach ($filteredTables as $table) {
            $capitalizedTable = ucwords(str_replace('_', ' ', $table));
            $totalRecords = DB::table($table)->count();
            $tableData[$capitalizedTable] = $totalRecords;
        }

        return view(
            'dashboard',
            [
                'tableData' => $tableData,
            ]
        );
    }
}
