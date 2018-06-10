<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/articles">Cruds</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ active('articles.index') }}"><a href="/articles">All Articles</a></li>
                <li class="{{ active('published') }}"><a href="/published">My Published Articles</a></li>
                <li class="{{ active('unpublished') }}"><a href="/unpublished">My Unpublished Articles</a></li>
                <li class="{{ active('articles.create') }}"><a href="/articles/create">Create New Article</a></li>
            </ul>

            <!-- dropdown not working -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

</body>
</html>