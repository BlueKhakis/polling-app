
    <h1>{{ $poll->name }}</h1>
    <a href="{{ action('PollController@index') }}">Back to index of polls</a>
    
 <h2>{{$poll->description}}</h2>

<form method='post' action='{{action("PollController@store", $poll->id) }}'>
@csrf
<ul>

 @foreach ($poll->options as $option)
 <li>{{$option->name}}</li>
 @if ($poll->single_choice === 0)

    <input type='checkbox' name='vote' value='{{$option->name}}'>
@else
    <input type='radio' name='vote' value='{{$option->name}}'>
@endif
 
 @endforeach
 </ul>
 <input type='submit'>
 </form>



@if (Auth::user()->id === $user_id)

<form method='post' action='{{action("PollController@destroy", $poll->id)}}'>
@csrf
@method('DELETE')
<input type="submit" value='Delete'>
</form> 

<form method='get' action='{{action("PollController@edit", $poll->id)}}'>
<input type="submit" value='Edit'>
</form> 
@endif

 @if (session('status'))
    {{ session('status') }}
@endif