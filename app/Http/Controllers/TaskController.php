<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\ResultsJob;

class TaskController extends Controller
{
    public function index()
    {

        $users = User::limit(10)->get();

        foreach ($users as $user) {
            ResultsJob::dispatch($user->email);
        }

        return 'email sent succesfully';
    }
}
