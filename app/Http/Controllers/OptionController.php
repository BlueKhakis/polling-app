<?php

namespace App\Http\Controllers;
use App\Models\Poll;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poll = Poll::create(
            ['name' => $request->name,
            'description' => $request->description,
            'single_choice' => $request->single_choice
        ]);

        // dd($polls->id);

        $rest = substr("option10", 0, 6);

        foreach($request->all() as $key => $value) {
            if (substr($key, 0, 6) === "option")
            {
                $option = Option::create(
                    [
                       'name' => $value,
                       'poll_id' => $poll->id,
                       'selected' => 0
                    ]
                );
            }
            print "$key => $value\n";
        }

        return redirect(action("PollController@index"));
        

        // for
        // $options = Option::create(
        //     ['name' => $request->name,
        //     'description' => $request->description,
        //     'single_choice' => $request->single_choice
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
