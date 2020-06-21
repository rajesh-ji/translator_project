    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="js/jquery.slimscroll.js"></script>
    
    <script src="js/waves.js"></script>
    
    <script src="js/sidebarmenu.js"></script>
    
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    
    <script src="js/custom.min.js"></script>
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="js/dashboard3.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- new (user.php) js files -->    
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- new js files -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#status').on('change', function(e) {
                
            		if($(this).is(':checked')) {
            	  	    var id = $(this).attr('userid');
            	  	    var status = 1;
            	  	    $('.statusTick').css("display","flex");
                	  } else {
                    	  	var id = $(this).attr('userid');
                    	  	var status = 0;
                    	  	$('.statusTick').css("display","none");
                	  }
                
            	  $.ajax({
            	      url:"loginStatus.php",
            	      method:"POST",
            	      data:{change:"loginStatus",id:id,status:status},
            	      success:function(res){
            	       //   alert(res);
            	      }
            	  });
        	});
        

        });
    </script>
    
</body>

</html>