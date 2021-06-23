<h1>How many options?</h1>

<form method='post' action="{{action('PollController@create2')}}">
@csrf
<input type="number" min='2' name='options' >

<input type="submit">

</form>