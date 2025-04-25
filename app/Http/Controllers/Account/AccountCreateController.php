<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class AccountCreateController extends MainController
{
    public function create(Request $request)
    {
        return view('account.account');
    }
}
