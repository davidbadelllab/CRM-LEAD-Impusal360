<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\MainController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactExportVCard extends MainController
{
    public function export(Request $request, int $id)
    {
        $contact = Contact::findOrFail($id);
        $fullName = $contact->first_name.' '.$contact->last_name;
        $fileName = Str::slug(title: $fullName, separator: '-').'_'.date('Ymd_His').'.vcf';
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $content = $contact->vCard();
        Storage::disk('local')->put($fileName, $content);

        return Storage::download($fileName, null, $headers);
    }
}
