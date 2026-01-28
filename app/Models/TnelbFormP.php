<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TnelbFormP extends Model
{
    protected $table = 'tnelb_form_p';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'login_id',
        'application_id',
        'applicant_name',
        'fathers_name',
        'applicants_address',
        'd_o_b',
        'age',
        'previously_number',
        'previously_date',
        'employer_detail',
        'form_name',
        'license_name',
        'app_status',
        'payment_status',
        'processed_by',
        'appl_type',
        'license_number',
        'old_application',
        'aadhaar',
        'pancard',
        'aadhaar_doc',
        'pan_doc',
        'certificate_no',
        'certificate_date',
        'cert_verify',
        'license_verify',
        'adminlverify',
        'admincverify',
        'submitted_date',
        'created_at',
        'updated_at'
    ];

    public static function getPendingCountFormp(){
        return self::whereIn('app_status', ['P','RE'])
        ->where('payment_status', 'payment')
            ->count();
    }

    public static function getcompletedCount()
    {
       return self::whereIn('app_status', ['F', 'A','RF'])
            ->whereIn('processed_by', ['A', 'SE', 'PR', 'S', 'SPRE'])
            ->count();
    }
}
