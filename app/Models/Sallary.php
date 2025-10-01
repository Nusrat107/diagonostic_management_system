<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sallary extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id', 'net_salary', 'basic_salary', 'da', 'hra', 'conveyance', 'allowance',
        'medical_allowance', 'other_earnings', 'tds', 'esi', 'pf', 'leave_deduction',
        'prof_tax', 'labour_welfare', 'fund', 'other_deductions', 'salary_month'
    ];

    public function employee()
    {
        return $this->belongsTo(Employe::class, 'staff_id', 'id');
    }

    // Auto-generate staff_id if not provided
    protected static function booted()
    {
        static::creating(function ($salary) {
            if (!$salary->staff_id) {
                $lastStaffId = Sallary::max('staff_id') ?? 0;
                $salary->staff_id = $lastStaffId + 1;
            }
        });
    }
}
