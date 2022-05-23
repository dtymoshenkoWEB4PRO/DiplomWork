<?php

namespace App\Http\Controllers\MainAdmin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainAdmin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return view('mainadmin.user.show', compact('user'));

    }
}
