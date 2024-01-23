<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;

class TaskController extends Controller
{
    public function index()
    {
        $public_tasks = Task::where('status', 'Public')->get();
        $private_tasks = Task::where('status', 'Private')->where('user_id', auth()->id())->get();

        return view('tasks.index', compact('private_tasks', 'public_tasks'));
    }
    public function edit(Request $request)
    {
        if ($request->task_id) {
            $task = Task::find($request->task_id);
        } else {
            $task = new Task();
        }
        return view("tasks.edit", compact('task'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'progress' => 'required',
            'status' => 'required',
        ]);
        if ($request->task_id) {
            $task = Task::find($request->task_id);
        } else {
            $task = new Task();
        }
        $task->user_id = auth()->user()->id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->progress = $request->progress;
        $task->status = $request->status;
        $task->save();

        return redirect('task/index');
    }
    public function show(Request $request)
    {
        $task = Task::find($request->task_id);
        $comments = Comment::where('task_id', $request->task_id)->get();

        return view('tasks.detail', compact('task', 'comments'));
    }
    public function delete(Request $request)
    {
        $task = Task::find($request->task_id);
        $comment = Comment::find($request->comment_id);
        if ($comment) {
            $comment->delete();
            return redirect()->back();
        } else {
            $task->delete();
            return redirect('task/index');
        }
    }
    public function comment(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $comments = new Comment();
        $comments->task_id = $request->task_id;
        $comments->user_id = auth()->user()->id;
        $comments->comment = $request->comment;
        $comments->save();

        return redirect()->back();
    }

}
