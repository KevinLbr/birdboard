<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Birdboard</h1>

<ul>
    @forelse($projects as $project)
        <li><a href="{{ $project->path() }}">{{ $project->title }}</a></li>
    @empty
        <li>No projects yet</li>
    @endforelse
</ul>
</body>
</html>
