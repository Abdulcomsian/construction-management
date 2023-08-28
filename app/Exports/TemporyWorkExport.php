<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\TemporaryWork;
use App\Models\PermitLoad;
use App\Models\TemporaryWorkComment;
use App\Models\Scaffolding;
use App\Models\User;
use Auth;

class TemporyWorkExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $status=[0,1,2,3];
        $user = User::with('userCompany')->find(Auth::user()->id);
        if($user->hasRole('admin'))
        {
            return TemporaryWork::select(
                'id',
                'twc_id_no',
                'description_temporary_work_required',
                'tw_category',
                'tw_risk_class',
                'design_issued_date',
                'design_required_by_date',
                'designer_company_name'
            )->get();
        } elseif($user->hasRole('company'))
        {
            $users = User::select(['id','name'])->where('company_id', $user->id)->get();
            $ids = [];
            $tot_emails = [];
            foreach ($users as $u) {
                $ids[] = $u->id;
            }
            $ids[] = $user->id;
            
            return TemporaryWork::select(
                'id',
                'twc_id_no',
                'description_temporary_work_required',
                'tw_category',
                'tw_risk_class',
                'design_issued_date',
                'design_required_by_date',
                'designer_company_name'
            )->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->latest()->get();
        } elseif($user->hasRole('user'))
        {
            $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->project_id;
            }
            
            return TemporaryWork::select(
                'id',
                'twc_id_no',
                'description_temporary_work_required',
                'tw_category',
                'tw_risk_class',
                'design_issued_date',
                'design_required_by_date',
                'designer_company_name'
            )->whereHas('project', function ($q) use ($ids) {
                $q->whereIn('project_id', $ids);
            })->whereIn('status',$status)->where(['estimator'=>0])->latest()->get();
        }
                
    }

    public function headings(): array
    {
        return [
            'TW ID',
            'DESCRIPTION OF TWS',
            'CAT CHECK',
            'RISK CLASS',
            'Comments',
            'Open Permit',
            'ISSUE DATE OF DESIGN BRIEF',
            'REQUIRED DATE OF DESIGN',
            'TW DESIGNER (DESIGNER NAME AND COMPANY)',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }


    public function map($invoice): array
    {
        $comments = TemporaryWorkComment::where(['temporary_work_id' => $invoice->id])->count();
        $openpermit = PermitLoad::where(['status' => 1, 'temporary_work_id' => $invoice->id])->count();
        $scaffpermit = Scaffolding::where(['status' => 1, 'temporary_work_id' => $invoice->id])->count();
        $totalopenpermit = $openpermit + $scaffpermit;
        return [
            $invoice->twc_id_no,
            $invoice->description_temporary_work_required,
            $invoice->tw_category ?? '0',
            $invoice->tw_risk_class,
            $comments,
            $totalopenpermit,
            $invoice->design_issued_date,
            $invoice->design_required_by_date,
            $invoice->designer_company_name

        ];
        $totalopenpermit = '';
    }
}
