<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\FaqRepositoryInterface;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function __construct(
        private readonly FaqRepositoryInterface $faqRepository
    ) {
    }

    public function index(): View
    {
        return view('services.index', [
            'faqs' => $this->faqRepository->getAll(),
        ]);
    }
}
