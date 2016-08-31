 <!DOCTYPE html>
 <html>
 <head>
        <title>AJ Constr. Co - @yield('title')</title>
    {!!HTML::style('assets/css_2/bootstrap.min.css')!!}
    {!!HTML::style('assets/css_2/modern-business.css')!!}
    {!!HTML::style('assets/css_2/font-awesome.min.css')!!}
    {!!HTML::style('assets/css_2/footer-basic-centered.css')!!}
    {!!HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')!!}	
    {!!HTML::script('scripts/js/bootstrap.min.js')!!}
    {!!HTML::script('scripts/js/jquery.js')!!}
 </head>
 <body>
 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/home">AJ Constr. Co Builder System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <li id="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="/admin/home">Home</a>
                    </li>
                     <li id="{{ Request::is('admin/apartment') ? 'active' : '' }}">
                        <a href="/admin/apartment">Apartments</a>
                    </li>
                     <li>
                        <a href="/admin/tenant">Tenants</a>
                    </li>
                     <li>
                        <a href="/admin/report">View Reports</a>
                    </li>
<!--                     <li>
                        <a href="/admin/payment">View Payments</a>
                    </li> -->
                    <li>
                        <a href="/admin/owner">Owners</a>
                    </li>
                     <li>
                        <a href="/auth/logout">Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
@yield('contents')
<footer class="footer-basic-centered">
@yield('footer');
<p class="footer-company-motto">Time is Gold</p>

            <p class="footer-links">
                <a href="#">Home</a>
                ·
                <a href="#">Blog</a>
                ·
                <a href="#">Pricing</a>
                ·
                <a href="#">About</a>
                ·
                <a href="#">Faq</a>
                ·
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">AJ Constr.Co &copy; 2015</p>
</footer>
			
 </body>
 </html>

 