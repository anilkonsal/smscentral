<!DOCTYPE html>
<html>
    <head>
        <title>SMS Central API</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  />
        <link rel="stylesheet" href="http://getbootstrap.com/examples/starter-template/starter-template.css"  />

    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sms Central</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
