<!-- Global site tag (gtag.js) - Google Analytics -->
@if (env('APP_ENV') == config('const.APP_ENV.production'))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129020896-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129020896-2');
    </script>
@else
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129020896-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129020896-1');
    </script>
@endif
