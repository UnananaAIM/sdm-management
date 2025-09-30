<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = [
            ['id' => 1, 'user_name' => 'Athena Cyntia', 'user_role' => 'UX Designer', 'title' => 'Working on Farm App', 'description' => 'Design landing & prototype page farm app', 'status' => 'ready', 'priority' => 'Medium'],
            ['id' => 2, 'user_name' => 'Max Verstappen', 'user_role' => 'Data Science', 'title' => 'Working on Project R', 'description' => 'Creating a dataset of user accounts', 'status' => 'ready', 'priority' => 'High'],
            ['id' => 3, 'user_name' => 'Messi', 'user_role' => 'Data Science', 'title' => 'Working on Project R', 'description' => 'Creating a dataset of user accounts', 'status' => 'ready', 'priority' => 'High'],
            ['id' => 4, 'user_name' => 'Ronaldo', 'user_role' => 'Data Science', 'title' => 'Working on Project R', 'description' => 'Creating a dataset of user accounts', 'status' => 'ready', 'priority' => 'High'],
            ['id' => 5, 'user_name' => 'Elon', 'user_role' => 'Data Science', 'title' => 'Working on Project R', 'description' => 'Creating a dataset of user accounts', 'status' => 'ready', 'priority' => 'High'],
            ['id' => 6, 'user_name' => 'Kylo Finn', 'user_role' => 'Back End Developer', 'title' => 'Working on Web Codelab', 'description' => 'Fix the wordpress in Project A there\'s some bug when click account', 'status' => 'complete', 'priority' => 'High'],
            ['id' => 7, 'user_name' => 'Fathia', 'user_role' => 'UX Designer', 'title' => 'Working on Web Codelab', 'description' => 'Design landing page', 'status' => 'standby', 'priority' => 'Medium'],
            ['id' => 8, 'user_name' => 'Erika', 'user_role' => 'Copywriter', 'title' => 'Working on Project Market', 'description' => 'Make a new promotion for a new product in market web', 'status' => 'notready', 'priority' => 'Medium'],
            ['id' => 9, 'user_name' => 'Jasmine', 'user_role' => 'Photograph', 'title' => 'Working on Web Codelab', 'description' => 'Displaying and merging data code', 'status' => 'complete', 'priority' => 'Low'],
            ['id' => 10, 'user_name' => 'Juan', 'user_role' => 'Web Developer', 'title' => '', 'description' => 'Get headache', 'status' => 'absent', 'priority' => ''],
        ];

        return view('dashboard', ['allTasks' => $tasks]);
    }
}
