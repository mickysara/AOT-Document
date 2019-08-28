<div class="toggler">
  <div id="effect" class="ui-widget-content ui-corner-all" style="width: 250px; height: 300px;">
    <h3 class="ui-widget-header ui-corner-all">Animate</h3>
  </div>
  <div id="effect" class="ui-widget-content ui-corner-all" style="width: 250px; height: 300px;">
    <h3 class="ui-widget-header ui-corner-all">Animate</h3>
  </div>
</div>
<button id="button" class="ui-state-default ui-corner-all">Toggle Effect</button>
 
  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    var state = true;
    $( "#button" ).on( "click", function() {
      if ( state ) {
        $( "#effect" ).animate({
          backgroundColor: "#aa0000",
          color: "#fff",
          
        }, 1000 );
      } else {
        $( "#effect" ).animate({
          backgroundColor: "#fff",
          color: "#000",
        }, 1000 );
      }
      state = !state;
    });
  } );
  </script>
