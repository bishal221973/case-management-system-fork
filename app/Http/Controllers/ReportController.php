<?php

namespace App\Http\Controllers;

use App\Cases;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request, Cases $cases)
    {
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->paginate(10);
        
        if ($request->filled('start') && $request->filled('end')){
            $allCases= $allCases->whereBetween('date', [$request->start, $request->end]);
        }
        if($request->filled('status')){
            
            $allCases= $allCases->where('case_status',$request->status);
           
        }
        // if($request->filled('witness')){
        //     $witness= $request->witness;
            
        //  $collection=collect($allCases);
        //  $data= $collection->firstWhere('id', '1');
        //  dd($data);
        // }
        // if($request->filled('type')){
        //     return "type filter";
        // }
        // if($request->filled('search')){
        //     return "mannual search";
        // }
        
        // $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->paginate(10);
       
        return view('report.index', compact(['allCases','cases']));
    }

    public function search(Request $request,Cases $cases)
    {
        
        // $allCases=Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->where('case_number',$request->case_data)->orWhere('case_status',$request->case_data)->get();
        // return $cases;
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')
        ->with('caseType')
        ->when($request->filled('search'), function ($query) {
            $query->where('case_number', request('search'))
                ->orWhere('case_status', request('search'))
                ->orWhereHas('partyDetail', function ($q) {
                    $q->where('first_name','like','%'. request('search').'%')
                        ->orWhere('last_name','like','%'. request('search').'%');
                })
                ->orWhereHas('oppositParty', function ($q) {
                    $q->where('first_name','like','%'. request('search').'%')
                        ->orWhere('last_name','like','%'. request('search').'%');
                })
                ->orWhereHas('informToParty', function ($q) {
                    $q->where('relation','like','%'. request('search').'%');
                })
                ->orWhereHas('caseType', function ($q) {
                    $q->where('case_type','like','%'. request('search').'%');
                });
                
            // ->orWhere('')
        })
        // ->where('case_number',$request->case_data)
        // ->orWhere('case_status',$request->case_data)
        ->get();
        // return $allCases;
        return view('report.index', compact(['allCases','cases']));
    }
    
    public function dateFilter(Request $request,Cases $cases)
    {
        $allCases=Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->whereBetween('date', [$request->start, $request->end])->paginate(10);
        // return $cases;
        return view('report.index', compact(['allCases','cases']));
    }

    public function caseStatus($key,Cases $cases)
    {
        $allCases=Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->where('case_status', $key)->paginate(10);
        return view('report.index', compact(['allCases','cases']));
    }
    

    public function witness($witness,Cases $cases)
    {
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')
        ->with('caseType')
        ->WhereHas('informToParty', function ($q) use($witness){
            $q->where('heir_name',$witness);
        })->get();

        return view('report.index', compact(['allCases','cases']));
    }
    public function caseType($type,Cases $cases)
    {
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')
        ->with('caseType')
        ->WhereHas('caseType', function ($q) use($type){
            $q->where('case_type',$type);
        })->get();

        return view('report.index', compact(['allCases','cases']));
    }
}