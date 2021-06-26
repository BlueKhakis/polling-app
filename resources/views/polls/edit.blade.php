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


{{-- it does render the old options --}}
<?php    $oldOptionsNo = sizeof($options->all()) ?>
<?php    $oldOptionsId = 0 ?>

    @for($i = 0; $i < $oldOptionsNo; $i++)
        <input type="text" name='option{{$options[$i]->id}}' value='{{$options[$i]->name}}'>
        <?php    $oldOptionsId = $i + 1 ?>
    @endfor


{{-- it does render the new options --}}
<?php    $newOptionsId = $oldOptionsId+1 ?>
    @for($i = 0; $i < $newOptionsNo; $i++)
        <input type="text" name='option{{$newOptionsId}}'>
    @endfor



<input type="submit">
</form>


<?php    $newOptionsNoA = $newOptionsNo ?>



<form method='post' action="{{action('PollController@editA', $poll->id)}}">
@csrf
@method('POST')
    <input type="hidden" name="newOptionsNoA" value={{ $newOptionsNoA = $newOptionsNoA + 1 }}>
    <button>add one</button>
</form>

    <?php var_dump($newOptionsNo) ?>
    <?php var_dump($newOptionsNoA) ?>

<?php $newOptionsNoB = $newOptionsNo ?>


<form method='post' action="{{action('PollController@editB', $poll->id)}}">
@csrf
@method('POST')
    <input type="hidden" name="newOptionsNoB" value={{ $newOptionsNoB = $newOptionsNoB - 2 }}>
    <button>remove one</button>
</form>

    <?php var_dump($newOptionsNo) ?>
    <?php var_dump($newOptionsNoB) ?>



{{-- 
<form action=" {{ action('PollController@edit', $poll->id)}} ">
    <input type="submit" name='plus' value=1 >
</form> --}}