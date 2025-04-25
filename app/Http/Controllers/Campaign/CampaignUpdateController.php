<?php

declare(strict_types=1);

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\MainController;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignUpdateController extends MainController
{
    public function update(Request $request, int $id)
    {
        $campaign = Campaign::find($id);
        $data['campaign'] = $campaign;
        $data['froms'] = [
            ['email' => Auth::user()->company->email, 'name' => Auth::user()->company->name],
            ['email' => Auth::user()->email, 'name' => Auth::user()->first_name.' '.Auth::user()->last_name],
        ];

        return view('campaign.campaign', $data);
    }
}
