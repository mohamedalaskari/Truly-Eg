<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TeamMemberRepositoryInterface;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __construct(
        private readonly TeamMemberRepositoryInterface $teamMemberRepository
    ) {
    }

    public function index(): View
    {
        return view('about.index', [
            'teamMembers' => $this->teamMemberRepository->getAll(),
        ]);
    }
}
