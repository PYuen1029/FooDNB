@extends('app')

@section('content')
<div class="container">
	<h1> Welcome to FooDNB: a leftovers tracker for Houston's Food Not Bombs charity </h1>

	<h2 id="foodnb"> What is FooDNB? </h2>

		<p>FooDNB is a catalogue system to record leftover food from the Food Not Bombs charity. For the Houston branch, they meet every Monday, Wednesday, Friday night at 8pm, and Sunday night at 7 pm to serve healthy vegan food to anyone who lines up and is hungry (at 521 Lamar 77002 (Downtown Library Courtyard). The problem is afterward, there is often some food that wasn’t served or picked up by volunteers or other charities, and sometimes this food goes to waste. </p>

	<h3 id="what-problem-does-this-app-solve">What problem does this app solve?</h3>
		<p>This web app intends to reduce the amount of waste by making it easily known to Food Not Bombs volunteers what food is leftover, so they can see what’s available and claim it and use it to share later on in the week. </p>

	<h3 id="what-is-it">What is it?</h3>

		<h4 id="special-features">Special Features</h4>

			<h6 id="live-days">“Live Days”</h6>
				<ul>
					<li>Live days are automatically made active from 7pm to midnight Central Time every Monday, Wednesday, Friday, and Sunday. Leftover food items are only able to be added, have their quantity changed, or deleted during this time period.</li>
				</ul>

			<h6 id="adding-leftovers">Adding Leftovers</h6>
				<ul>
					<li>During Live Days, you can add leftover food items, set the quantity available, edit the name or quantity, and delete the food item. </li>
				</ul>

			<h6 id="display-leftovers">Display Leftovers</h6>
				<ul>
					<li>After the day is over then the leftovers will be put on display on the index page. Only leftovers within the last week will be shown, and be able to be claimed to ensure freshness, however the number of days can be easily changed by the administrator. </li>
					<li>To claim a quantity, simply just increase the claimed amount on the index page. This will decrease the quantity available so eventually no one will be able to claim anymore. Likewise, if you decrease the claimed quantity because you changed your mind, the quantity available will increase the same amount.</li>
					<li>You can also change the name of the leftover item if you made a mistake. However I can change this later if you don’t want the name to be editable.</li>
				</ul>
			<h6 id="authentication">Authentication</h6>
				<ul>
					<li>A quick registration system requires users to register before being able to see, claim, edit, or delete leftover food. If desired, it can also require administrator approval for a user before they can see or edit anything.</li>
				</ul>

	<h3 id="how-do-I-get"> How do I get involved?</h3>
		<p> You can register on the top right corner, and see what leftovers is available. And of course you can join us at 521 Lamar 77002 (Downtown Library Courtyard) Mon., Wed., Fri. 8pm, and Sun. 7pm. Bring vegan food or just bring yourself! We have bowls and spoons. For more information about Houston Food Not Bombs, visit <a href="http://houstonfoodnotbombs.org/"> their website. </a> </p>
</div>
@stop