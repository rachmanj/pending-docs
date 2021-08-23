<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index011()
    {
        $project = '011C';
        $outsdocs = $this->outsdocs()->where('project', $project);

        return datatables()->of($outsdocs)
            ->editColumn('inv_date', function ($outsdocs) {
                return date('d-M-Y', strtotime($outsdocs->inv_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'outsdocs.011C.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index017()
    {
        $project = '017C';
        $outsdocs = $this->outsdocs()->where('project', $project);

        return datatables()->of($outsdocs)
            ->editColumn('inv_date', function ($outsdocs) {
                return date('d-M-Y', strtotime($outsdocs->inv_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'outsdocs.017C.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function indexAPS()
    {
        $project = 'APS';
        $outsdocs = $this->outsdocs()->where('project', $project);

        return datatables()->of($outsdocs)
            ->editColumn('inv_date', function ($outsdocs) {
                return date('d-M-Y', strtotime($outsdocs->inv_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'outsdocs.APS.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function outsdocs()
    {
        $date = Carbon::now();

        $list = DB::table('irr5_addoc')
                ->join('irr5_invoice', 'irr5_addoc.inv_id', '=', 'irr5_invoice.inv_id')
                ->join('irr5_doctype', 'irr5_addoc.doctype', '=', 'irr5_doctype.doctype_id')
                ->join('irr5_project', 'irr5_invoice.inv_project', '=', 'irr5_project.project_id')
                ->select(
                    'irr5_addoc.addoc_id',
                    'irr5_addoc.docnum',
                    'irr5_doctype.docdesc as doctype',
                    'irr5_invoice.inv_no',
                    'irr5_invoice.inv_id',
                    'irr5_invoice.po_no',
                    'irr5_invoice.receive_date as inv_date', 
                    'irr5_project.project_code as project',
                    DB::raw("datediff(curdate(), irr5_invoice.receive_date) as days")
                )
                ->whereNull('docreceive')
                ->whereYear('inv_date', $date)
                // ->orderBy('doctype', 'asc')
                ->orderBy('days', 'desc')
                ->get();
                
 
                return $list;
    }
}
