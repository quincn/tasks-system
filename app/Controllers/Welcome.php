<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Welcome extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $today = date('Y-m-d');

        $tasks = $taskModel
            ->where('task_date', $today)
            ->findAll();

        return view('welcome', ['tasks' => $tasks]);
    }
}