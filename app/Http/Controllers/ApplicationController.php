<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ApplicationController extends Controller
{
    public function __invoke(): Factory|View|Response|Application
    {
        return view('application', [
            'data' => collect([
                'user' => auth()->user()
            ])
        ]);
    }
}
