<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Git\CreateGitToken;
use App\Models\GitToken;
use Auth;
use Inertia\Inertia;

class GitTokenController extends Controller
{
    public function index()
    {
        return Inertia::render('Settings/GitIntegration', [
            'tokens' => GitToken::where('user_id', Auth::id())->get(),
        ]);
    }

    public function store(CreateGitToken $request)
    {
        GitToken::create([
            'name' => $request->name,
            'token' => $request->token,
            'user_id' => Auth::id(),
        ]);

        return back(303);
    }

    public function destroy(GitToken $token)
    {
        $token->delete();

        return back(303);
    }
}
