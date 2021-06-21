<h1>Create new poll</h1>

<form method='post' action="">
@csrf
Name
<input type="text" name='name'>
<br>
Desc
<input type="text" name='description'>
<br>
Single choice:
Yes
<input type="radio" name="single_choice" id="0">
No
<input type="radio" name="single_choice" id="1">

<input type="number" min='2'>

<input type="text">
<input type="text">



</form>