<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\MainController;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LeadExportController extends MainController
{
    public function export(Request $request)
    {
        $separator = ';';
        $lead = new Lead();
        $fileName = 'leads_'.Auth::user()->company->name.'_'.date('Ymd_His').'.csv';
        $leads = Lead::where('company_id', Auth::user()->company_id)->get();
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = array_merge(['id'], $lead->getFillable(), ['created_at', 'updated_at']);
        $rowHeaders = implode($separator, $columns);
        $data = $leads->toArray();

        $content = $rowHeaders."\n";
        foreach ($data as $row) {

            $line = [];

            $row['tags'] = is_array($row['tags']) ? implode(separator: ',', array: $row['tags']) : '';
            $row['notes'] = is_null($row['notes']) ? null : str_replace(["\r", "\n"], '-', $row['notes']);
            $row['country_id'] = $row['country']['id'];
            $row['seller_id'] = $row['seller']['id'];
            $row['industry_id'] = $row['industry']['id'];
            $row['company_id'] = $row['company']['id'];

            // This ensures that each value is in the same order as the fields in the header.
            foreach ($columns as $column) {
                if (isset($row[$column])) {
                    $line[] = $row[$column];
                }
            }

            $line = implode($separator, $line);
            $content = $content.$line."\n";
        }

        Storage::disk('local')->put($fileName, $content);

        return Storage::download($fileName, null, $headers);
    }
}
