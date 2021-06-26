<h2>List of polls</h2>
    
    @forelse($polls as $poll)
        <div>
            <h3><a href="{{action('PollController@show',$poll->id)}}">{{ $poll->name }}</a></h3>

        </div>
    @empty
         <p>No polls created :(</p>
    @endforelse

    <button onclick='window.location.href="{{action('PollController@create')}}"'>Create new poll</button>