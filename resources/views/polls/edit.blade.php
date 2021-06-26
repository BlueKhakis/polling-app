<form method='post' action="{{action('PollController@update', $poll->id)}}">
@csrf
@method('PUT')
Name
<input type="text" name='name' value='{{$poll->name}}'>
<br>
Desc
<input type="text" name='description' value='{{$poll->description}}'>
<br>
Single choice:
Yes
<input type="radio" name="single_choice" id="0" value='1'>
No
<input type="radio" name="single_choice" id="1" value='0'>

<input type="hidden" name='number_of_options' value='{{sizeof($options->all())}}'>
<input type="hidden" name='_method' value='PUT'>

{{$option_number = $options[0]->id}}

@for($i = 0; $i < sizeof($options->all()); $i++)
<input type="text" name='option{{$option_number}}' value='{{$options[$i]->name}}'>
{{$option_number++}}
@endfor

<input type="submit">

</form>
