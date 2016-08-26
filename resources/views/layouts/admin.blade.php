<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Blog</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Hind+Madurai|Lato" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen,projection" >
        <link href="https://raw.githubusercontent.com/cesarve77/select2-materialize/master/select2-materialize.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    </head>
    <body id="app-layout">
        <header>
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
            </ul>
            <nav class="indigo darken-4">
                <div class="nav-wrapper">
                    <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                        <i class="medium mdi-navigation-menu" style="font-size:1.8rem; margin-left:30px;"></i>
                    </a>
                    <a href="{{ url('/') }}" class="brand-logo" style="font-size:1.8rem; margin-left:15px;">My Blog</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown1" data-beloworigin="true">
                                {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <ul id="nav-mobile" class="right hide-on-large-only">
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown2" data-beloworigin="true">
                                <i class="material-icons right">more_vert</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $(".js-data-example-ajax").select2({
                  ajax: {
                    url: "http://localhost:8888/blog/public/search",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                      return {
                        q: params.term, // search term
                        page: params.page
                      };
                    },
                    processResults: function (data, params) {
                      // parse the results into the format expected by Select2
                      // since we are using custom formatting functions we do not need to
                      // alter the remote JSON data, except to indicate that infinite
                      // scrolling can be used
                      params.page = params.page || 1;
                      var arr = []
                      data.forEach(function(dat){
                        arr.push({
                            id: dat.id,
                            text: dat.title,
                            abstract: dat.abstract,
                            content: dat.content
                        });   
                      });
                      console.log(arr);
                      return {
                        results: arr,
                        pagination: {
                          more: (params.page * 30) < data.total_count
                        }
                      };
                    },
                    cache: true
                  },
                  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                  minimumInputLength: 1,
                });
        });
            var $eventSelect = $(".js-data-example-ajax");
            $eventSelect.on("select2:select", function (e) { console.log(e.params.data.text); });
        </script>
    </body>
</html>
