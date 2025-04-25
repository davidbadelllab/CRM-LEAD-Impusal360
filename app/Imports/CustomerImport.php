<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerImport implements SkipsEmptyRows, ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Customer([
            'company_id' => $row['company_id'],
            'name' => $row['name'],
            'business_name' => $row['business_name'],
            'vat' => $row['vat'],
            'phone' => $row['phone'],
            'phone2' => $row['phone2'],
            'mobile' => $row['mobile'],
            'email' => $row['email'],
            'email2' => $row['email2'],
            'country_id' => $row['country_id'],
            'website' => $row['website'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
        ];
    }
}
