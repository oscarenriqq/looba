<?php

namespace App\Http\Controllers;

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

    public function store(Request $request) 
    {
        $request->validate([
            'category' => 'integer|required',
            'technology' => 'integer|required',
            'theme' => 'integer|required',
            'difficulty' => 'integer|required',
            'comments' => 'max:75|string|required',
        ]);

        dd($request->all());
    }
}
