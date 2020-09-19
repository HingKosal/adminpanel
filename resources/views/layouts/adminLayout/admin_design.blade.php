<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset("css/backend_css/bootstrap.min.css")}}" />
<link rel="stylesheet" href="{{asset("css/backend_css/bootstrap-responsive.min.css")}}" />
<link rel="stylesheet" href="{{asset("css/backend_css/fullcalendar.css")}}" />
<link rel="stylesheet" href="{{asset("css/backend_css/matrix-style.css")}}" />
<link rel="stylesheet" href="{{asset("css/backend_css/matrix-media.css")}}" />
<link href="{{asset("fonts/backend_fonts/css/font-awesome.css")}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset("css/backend_css/jquery.gritter.css")}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layouts.adminLayout.admin_header');
@include('layouts.adminLayout.admin_sidebar');

@yield('content');

@include('layouts.adminLayout.admin_footer');


<script src="{{asset("backend_js/js/excanvas.min.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.min.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.ui.custom.js")}}"></script>
<script src="{{asset("backend_js/js/bootstrap.min.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.flot.min.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.flot.resize.min.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.peity.min.js")}}"></script>
<script src="{{asset("backend_js/js/fullcalendar.min.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.dashboard.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.gritter.min.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.interface.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.chat.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.validate.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.form_validation.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.wizard.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.uniform.js")}}"></script>
<script src="{{asset("backend_js/js/select2.min.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.popover.js")}}"></script>
<script src="{{asset("backend_js/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("backend_js/js/matrix.tables.js")}}"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
