<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository
    ) {
    }

    public function index(): View
    {
        return view('contact.index');
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $this->contactRepository->create($request->validated());

        return back()->with('status', 'Thank you for reaching out! Our team will contact you shortly.');
    }
}
