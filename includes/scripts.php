<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>

<?php if($_SERVER['SERVER_NAME'] == 'kc.dev'): ?>
    <!-- individual scripts <script src='/js/*.js'></script> -->
<?php else: ?>
    <script src='/build/scripts.min.js'></script>
    <script async src="http://www.google-analytics.com/ga.js"></script>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-34739572-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
<?php endif; ?>