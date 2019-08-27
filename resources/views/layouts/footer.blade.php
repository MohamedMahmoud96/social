</div>
</div>
 <!-- Scripts -->
     <!-- Once the page is loaded, initialized the plugin. -->
    
    <script type="text/javascript" src="{{ asset('front-end/js/jquery-2.1.1.js')}}" ></script>
    <!-- jQuery Pinterest -->
    <script type="text/javascript" src="{{ asset('front-end/js/jquery.pinto.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front-end/js/main.js')}}"></script>
    
    <!-- Light Box -->
    <script src="{{ asset('front-end/js/lightbox-plus-jquery.min.js')}}"></script>
    
    <!-- Menu -->
    <script src="{{ asset('front-end/js/script.js')}}"></script>
    <script src="{{asset('front-end/js/ajax.js')}}"></script>
  

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('js')
  <script type="text/javascript">
        $('#container').pinto();
    </script>
<script>
 

</script>
</body>
</html>