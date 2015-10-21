<php?


if (! $request->user()->isATeamManager())
{
	return redirect('articles');
}

return $next($request);


?>