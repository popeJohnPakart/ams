<!doctype html>
<html lang="en">
<head>

<title>Tenant</title>
    {!!HTML::style('assets/css_2/bootstrap.min.css')!!}
    {!!HTML::style('assets/css_2/modern-business.css')!!}
    {!!HTML::style('assets/css_2/font-awesome.min.css')!!}
    {!!HTML::style('assets/css_2/footer-distributed.css')!!}
    {!!HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')!!}	
    {!!HTML::script('scripts/js/bootstrap.min.js')!!}
    {!!HTML::script('scripts/js/jquery.js')!!}
<body>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">	
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home">AJ Constr. Co Builder System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <li>
                        <a href="/tenant/home">Home</a>
                    </li>
                     <li>
                        <a href="/tenant/writeReports">Write Maintenance Reports</a>
                    </li>
<!--                     <li>
                        <a href="/tenant/viewReceipts">Payments</a>
                    </li>
				   <li>
                        <a href="/tenant/viewExpenses">View Expenses</a>
                    </li>   -->
				   <li>
                        <a href="/auth/logout">Logout</a>
                    </li>             
                </ul>
            </div>
        </div>
    </nav>
    @yield('contents')
</body>
</html>