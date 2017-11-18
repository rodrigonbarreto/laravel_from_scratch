<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    /**
     * @param RegistrationRequest $registrationRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegistrationRequest $registrationRequest)
    {
        $registrationRequest->persist();

    	// Redirect to the home page
    	return redirect()->home();
    }
}
