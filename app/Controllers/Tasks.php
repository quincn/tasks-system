<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function new()
    {
        return view('tasks_new');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return view('tasks_new', [
                'validation' => $this->validator
            ]);
        }

        $taskModel = new \App\Models\TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tasks_edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return view('tasks_edit', [
                'task'       => $task,
                'validation' => $this->validator
            ]);
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks');
    }
}