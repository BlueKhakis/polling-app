
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
 @if (session('status'))
    {{ session('status') }}
@endif