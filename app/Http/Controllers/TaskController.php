<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Data dummy untuk tasks
        $taskData = [
            'todo' => [
                [
                    'title' => 'Wordpress plugin update',
                    'company' => 'Website Management Company',
                    'priority' => 'High',
                    'due_date' => Carbon::parse('2024-11-04'),
                    'assignees' => ['https://ui-avatars.com/api/?name=AB&background=random']
                ],
                [
                    'title' => 'Running login view',
                    'company' => 'CafeLink Menu Transactions Via Website',
                    'priority' => 'Low',
                    'due_date' => Carbon::parse('2024-11-01'),
                    'assignees' => ['https://ui-avatars.com/api/?name=CD&background=random']
                ]
            ],
            'in-progress' => [
                [
                    'title' => 'Create website design',
                    'company' => 'TokoKu Online Marketplace Application',
                    'priority' => 'Medium',
                    'due_date' => Carbon::parse('2024-11-04'),
                    'assignees' => [
                        'https://ui-avatars.com/api/?name=EF&background=random',
                        'https://ui-avatars.com/api/?name=GH&background=random'
                    ]
                ],
                [
                    'title' => 'Human resources data company',
                    'company' => 'Website Management Company',
                    'priority' => 'Low',
                    'due_date' => Carbon::parse('2024-11-15'),
                    'assignees' => ['https://ui-avatars.com/api/?name=IJ&background=random']
                ],
                 [
                    'title' => 'Dashboard revision',
                    'company' => 'SiteCraft Websites That Bring Your Business to Life',
                    'priority' => 'Low',
                    'due_date' => Carbon::parse('2024-11-02'),
                    'assignees' => ['https://ui-avatars.com/api/?name=KL&background=random']
                ]
            ],
            'review' => [
                [
                    'title' => 'Website menu view',
                    'company' => 'CafeLink Menu Transactions Via Website',
                    'priority' => 'High',
                    'due_date' => Carbon::parse('2024-11-04'),
                    'assignees' => [
                        'https://ui-avatars.com/api/?name=MN&background=random',
                        'https://ui-avatars.com/api/?name=OP&background=random'
                        ]
                ],
                [
                    'title' => 'Marketplace display menu',
                    'company' => 'Website Management Company',
                    'priority' => 'High',
                    'due_date' => Carbon::parse('2024-11-01'),
                    'assignees' => ['https://ui-avatars.com/api/?name=QR&background=random']
                ]
            ],
            'completed' => [
                [
                    'title' => 'Create login page',
                    'company' => 'VirtuSphere Digital Innovation Without Borders',
                    'priority' => 'Medium',
                    'due_date' => Carbon::parse('2024-11-04'),
                    'assignees' => ['https://ui-avatars.com/api/?name=ST&background=random']
                ],
                [
                    'title' => 'Create flowchart',
                    'company' => 'TokoKu Online Marketplace Application',
                    'priority' => 'Medium',
                    'due_date' => Carbon::parse('2024-11-01'),
                    'assignees' => ['https://ui-avatars.com/api/?name=UV&background=random']
                ]
            ]
        ];

        // Mengirim data ke view
        return view('task.index', ['task' => $taskData]);
    }
}