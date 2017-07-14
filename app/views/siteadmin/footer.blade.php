{{ HTML::script( 'assets/dist/js/jquery-1.7.2.min.js' ) }}
{{ HTML::script( 'assets/dist/js/bootstrap.min.js' ) }}
{{--{{ HTML::script( 'assets/dist/js/eCommerce.js' ) }} --}}
<script type="text/javascript">
	$('.ttip').tooltip();
	
	$(document).ready(function(){
		$("#photoimg").change(function(){
			var file = document.getElementById("photoimg").files[0];
			var readImg = new FileReader();
			readImg.readAsDataURL(file);
			readImg.onload = function(e) {
				$('.prevImg').attr('src',e.target.result).fadeIn();
			}		
		})	
	})

	// Menu toggle
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    
</script>
</body>
</html>