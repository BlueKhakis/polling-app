<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Vote;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::orderBy('name')->get();

        return view('polls.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polls.create');
    }

    public function create2(Request $request)
    {
        $options = $request->options;

        return view('polls.create2', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $poll_id)
    {
        $option = Option::where('name', $request->vote)->get();

        

       

        $votes = Vote::create(
            ['user_id' => Auth::user()->id,
            'poll_id' => $poll_id,
            'option_id' => $option[0]->id,
            'name' => $request->vote
        ]);

        Session::flash('status', 'thank you for voting for Deez Nuts in poll');

        return redirect(action('PollController@show', $poll_id));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::findOrFail($id);

        $user_id = $poll->user_id;

        return view('polls.show', compact('poll', 'user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::findOrFail($id);

        $options = Option::where('poll_id', $poll->id)->get();

        

        return view('polls.edit', compact('poll', 'options'));
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
        
// dd($request->all());

$oldOptions = Option::where('poll_id', $poll->id)->get();
        
foreach($request->all() as $item)
        {
           var_dump($item);
            if (empty($item))
            {
                $item = $oldOptions;
            }
            else
            {
                dd('not empty');
            }

        }

        $poll = Poll::findOrFail($id);
        $poll->update($request->all());

        

        $newOptions = $request->all();

        for ($i = 0; $i < sizeof($oldOptions); $i++)
        {

            foreach($newOptions as $key => $value) {

                if (substr($key, 6) == $oldOptions[$i]->id)
                {
                    $oldOptions[$i]->update([
                        'name' => $value
                    ]);
                }
        }    } 

        return redirect(action('PollController@show', $id));
    }
       
       
    //     foreach($oldOptions as $oldOption)
    //     {
    //         for ($i = 0; $i < sizeof($oldOptions); $i++)
    //         {
    //         if (substr($request[i]->id, 0, 6) === $oldOptions[i]->id )
    //         {
    //         $oldOption->update($request->all());
    //         }
    //     }
    //     }
    // }

    //     return redirect(action('PollController@show', $poll->id));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);

        $poll->delete();

        return redirect(action('PollController@index'));

    }
}
