<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $articles = Models\Article::all();
            $users = Models\User::all();
        } else {
            $articles = Models\Article::where('author', $user->name)->get();
            $users = Models\User::where('id', $user->id)->get();
        }

        $tables = DB::select('SHOW TABLES');
        $tableNames = array_map('current', $tables);

        $excludedTables = [
            'cache',
            'cache_locks',
            'failed_jobs',
            'jobs',
            'job_batches',
            'migrations',
            'password_reset_tokens',
            'sessions',
            'likes',
        ];

        $filteredTables = array_filter($tableNames, function ($table) use ($excludedTables) {
            return !in_array($table, $excludedTables);
        });

        $tableData = [];
        foreach ($filteredTables as $table) {
            $capitalizedTable = ucwords(str_replace('_', ' ', $table));
            $totalRecords = DB::table($table)->count();
            $tableData[$capitalizedTable] = $totalRecords;
        }

        $columns = [
            'Articles' => ['#', 'Title', 'Author', 'Created at', 'Updated at', 'Action'],
            'Users' => ['#', 'Name', 'Email', 'Created at', 'Updated at', 'Action'],
        ];

        $rows = [
            'Articles' => $articles->map(function ($article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'author' => $article->author,
                    'created_at' => $article->created_at->format('M d, Y'),
                    'updated_at' => $article->updated_at->format('M d, Y'),
                    'action' => [
                        'edit' => route('blog.edit', $article->id),
                        'delete' => route('blog.destroy', $article->id),
                    ]
                ];
            }),
            'Users' => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at->format('M d, Y'),
                    'updated_at' => $user->updated_at->format('M d, Y'),
                    'action' => [
                        'edit' => route('users.edit', $user->id),
                        'delete' => route('users.destroy', $user->id),
                    ]
                ];
            }),
        ];

        $activeTable = $request->query('activeTable', 'Overview');

        $createUrl = match ($activeTable) {
            'Users' => route('users.create'),
            'Articles' => route('blog.create'),
            default => '#',
        };

        return view('dashboard', compact('filteredTables', 'tableData', 'activeTable', 'createUrl', 'columns', 'rows'));
    }
}
