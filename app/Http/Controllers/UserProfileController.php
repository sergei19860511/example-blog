<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserProfileController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function showProfile()
    {
        return view('profile');
    }


    /**
     * @param ProfileRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function edit(ProfileRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store();
        }

        if (auth('web')->user()->update($data)) {
            return redirect(route('profile'))->with(['status' => true]);
        }

        return redirect(route('profile'))->withErrors();
    }
}
