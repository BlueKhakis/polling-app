<form method='post' action="{{action('OptionController@store')}}">
@csrf
Name
<input type="text" name='name'>
<br>
Desc
<input type="text" name='description'>
<br>
Single choice:
Yes
<input type="radio" name="single_choice" id="0" value='1'>
No
<input type="radio" name="single_choice" id="1" value='0'>

<input type="hidden" name='number_of_options' value='{{$options}}'>

@for($i = 0; $i < $options; $i++)
<input type="text" name='option{{$i}}'>
@endfor

<input type="submit">

</form>