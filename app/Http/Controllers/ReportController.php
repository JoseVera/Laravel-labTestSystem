<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Validator;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $reports = \DB::table('reports')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->select('reports.id','reports.name', 'reports.create_date', 'users.name as user_name' )
            ->get();
        
            

        return view('report_index',['reports'=> $reports]);
    }


    public function indexPacient()
    {
         $id = Auth::id();
         //dd($id);

         $reports = \DB::table('reports')
            ->where('user_id' , $id)
            ->get();
        
        //dd($reports);
            

        return view('reportPatient_index',['reports'=> $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::where('group', 'patient')->get();    
        return view('report_create',['name' => '','users' => $users ]);       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(), 
            [
                'name' => 'required',
                'user' => 'required',
                'test_id' => 'required',
            ] 
            );

        if( $validator->fails() )
        {
            return redirect('report/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $data = [
            'name' => $request->input('name'),
            'create_date' => Carbon::now(),
            'user_id' => $request->input('user')
        ];

        //dd($data);
        
        $Report = \App\Report::create($data);

        $insertedId = $Report->id;
        $test = $request->input('test_id');

        \App\Test::where('id' , $test)
                    ->update([
                        'report_id'=>$insertedId,
                                
                        ]);
        
        
        return redirect('report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = \DB::table('reports')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->select('reports.name', 'reports.create_date', 'users.name as patient_name' )
            ->where('reports.id', $id)
            ->first();

        $tests = \DB::table('tests')
            ->where('report_id', $id)
            ->get();        
        //dd($tests);    

        $data = [
            'name' => $report->name,
            'date' => $report->create_date,
            'patient_name' => $report->patient_name,
            'tests' => $tests,
        ];


        return view('report_detail',$data);
    }



    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPacient($id)
    {
        $report = \DB::table('reports')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->select('reports.name', 'reports.create_date', 'users.name as patient_name' )
            ->where('reports.id', $id)
            ->first();

        $tests = \DB::table('tests')
            ->where('report_id', $id)
            ->get();        
        //dd($tests);    

        $data = [
            'report_id' => $id,
            'name' => $report->name,
            'date' => $report->create_date,
            'patient_name' => $report->patient_name,
            'tests' => $tests,
        ];


        return view('reportPacient_detail',$data);
    }


    /**
     * Show the PDF View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request, $id)
    {
        //$reports = DB::table("reports")->get();
        $report = \DB::table('reports')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->select('reports.name', 'reports.create_date', 'users.name as patient_name' )
            ->where('reports.id', $id)
            ->first();

        $tests = \DB::table('tests')
            ->where('report_id', $id)
            ->get();        
        //dd($tests);    

        $data = [
            'name' => $report->name,
            'date' => $report->create_date,
            'patient_name' => $report->patient_name,
            'tests' => $tests,
        ];

        //dd($data);
        //view()->share('reports',$reports);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview');
        }


        // save pdf copy to send by email    
        PDF::loadView('pdfview',$data)->save("files/report_".$id.".pdf");  
        
        // comment to view PDF preview design
        
        $pdf = PDF::loadView('pdfview',$data);
        return $pdf->download('pdfview');

         
        
        // uncomment to see PDF preview design
        // http://localhost:8000/pdfview/{id}
        
        //return view('pdfview',$data);
    }


   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = \DB::table('reports')
            ->select('reports.name', 'reports.create_date', 'reports.user_id' )
            ->where('reports.id', $id)
            ->first();

        $tests = \DB::table('tests')
            ->where('report_id', $id)
            ->get();        
        
        $users = \App\User::where('group', 'patient')->get();  

        $data = [
            'name' => $report->name,
            'date' => $report->create_date,
            'userSel' => $report->user_id,
            'users' => $users,
            'tests' => $tests,
        ];


        return view('report_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make( $request->all(), 
            [
                'name' => 'required',
                'user' => 'required',
                'date' => 'required',
            ] 
            );

        if( $validator->fails() )
        {
            return redirect('report/{$id}')
                        ->withErrors($validator)
                        ->withInput();
        }


        \App\Report::where('id' , $id)
                    ->update([
                                'name' => $request->input('name'),
                                'create_date'=> $request->input('date'),
                                'user_id' => $request->input('user')
                        ]);
        
        return redirect('report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         \App\Report::destroy( $id );
        return redirect('report');
    }


    public function userDropDownData($id)
    {
       $tests = \App\Test::where([
            ['user_id', '=', $id],
            ['report_id', '=', '0'],
        ])->get();

       
       return Response::json($tests);
    }
}
