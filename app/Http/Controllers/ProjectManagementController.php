<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateProjectRequest;
use App\Models\Project;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ProjectManagementService;

class ProjectManagementController extends Controller
{
    protected $projectManagementService;

    public function __construct(ProjectManagementService $projectManagementService)
    {
        $this->projectManagementService = $projectManagementService;
    }

    public function index() {
        return Inertia::render('ProjectManagement/Index', [
            'categories' => $this->projectManagementService->getCategories(),
            'themes' => $this->projectManagementService->getThemes(),
            'technologies' => $this->projectManagementService->getTechnologies(),
            'difficulties' => $this->projectManagementService->getDifficulties(),
        ]);
    }

    public function store(GenerateProjectRequest $request) 
    {
        $project = new Project;
        $project->category_id = $request->input('category');
        $project->technology_id = $request->input('technology');
        $project->theme_id = $request->input('theme');
        $project->difficulty_id = $request->input('difficulty');
        $project->comments = $request->input('comments');

        dd($project->getPrompt());
        
    }
}
