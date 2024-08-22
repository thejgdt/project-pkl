<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Support\Facades\DB;

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

        $articles = Models\Article::query()->get();
        $users = Models\User::query()->get();

        $columns = [
            'Articles' => ['#', 'Title', 'Author', 'Created at', 'Updated at'],
            'Users' => ['#', 'Name', 'Email', 'Created at', 'Updated at'],
        ];

        $rows = [
            'Articles' => $articles,
            'Users' => $users,
        ];

        return view(
            'dashboard',
            [
                'filteredTables' => $filteredTables,
                'tableData' => $tableData,
                'capitalizedTable' => $capitalizedTable,
                'columns' => $columns,
                'rows' => $rows,
            ]
        );
    }
}
