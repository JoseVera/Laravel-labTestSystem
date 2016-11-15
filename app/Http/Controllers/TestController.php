<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon; 

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tests = \DB::table('tests')
            ->join('users', 'users.id', '=', 'tests.user_id')
            ->select('tests.id','tests.name', 'tests.result', 'tests.create_date', 'users.name as user_name' )
            ->get();

        return view('test_index',['tests'=> $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::where('group', 'patient')->get();    
         
        return view('test_add',['name' => '','results' => '','users' => $users ]);    
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
                'results' => 'required',
                'user' => 'required',
            ] 
            );

        if( $validator->fails() )
        {
            return redirect('test/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $data = [
            'name' => $request->input('name'),
            'result' => $request->input('results'),
            'create_date' => Carbon::now(),
            'report_id'=>0,
            'user_id' => $request->input('user')
        ];

        //dd($data);
        
        \App\Test::create($data);
        return redirect('test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tests = \DB::table('tests')
            ->join('users', 'users.id', '=', 'tests.user_id')
            ->select('tests.id','tests.name', 'tests.result', 'tests.create_date', 'users.name as user_name' )
            ->where('tests.id', $id)
            ->first();

        $data = [
            'name' => $tests->name,
            'results' => $tests->result,
            'user' => $tests->user_name
        ];

        return view('test_detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = \App\User::where('group', 'patient')->get();  
        $tests = \App\Test::where('id', $id)->first();  
        
        //dd($tests);        
        $data = [
            'name' => $tests->name,
            'results' => $tests->result,
            'userSel' => $tests->user_id,
            'users' => $users

        ];

        return view('test_edit',$data);  
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
                'results' => 'required',
                'user' => 'required',
            ] 
            );

        if( $validator->fails() )
        {
            return redirect('test/{$id}')
                        ->withErrors($validator)
                        ->withInput();
        }


        \App\Test::where('id' , $id)
                    ->update([
                                'name' => $request->input('name'),
                                'result' => $request->input('results'),
                                'report_id'=>0,
                                'user_id' => $request->input('user')
                        ]);
        
        return redirect('test');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Test::destroy( $id );
        return redirect('test');
    }
}
