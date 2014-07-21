<?php include_once(APPPATH . 'views/_init.php') ?> 

<?php
	if($this->uri->segment(2) == 'men'){

		$main_id = 'men'; $content_id = "content-men";

	}elseif($this->uri->segment(2) == 'family'){

		$main_id = 'family';$content_id = "content-family";

	}elseif($this->uri->segment(1) == 'contents'){

		$main_id = 'activity';$content_id = "activity-main";
	}
?>
<div class="main" id="<?php echo $main_id; ?>">
	<?php include_once(APPPATH . 'views/_header.php')//echo $header ?><!-- end of header div --> 
	
	<?php include_once(APPPATH . 'views/_breadcrumb.php') ?>

	<div id="container">
		
			
			<?php 


			if($this->uri->segment(1) == 'products'){

				include_once(APPPATH . 'views/_product.php');

			}elseif($this->uri->segment(1) == 'contents'){

				include_once(APPPATH . 'views/_activity_detail.php');
			}

			


			 ?>
			
			<div class="line-art"></div>
			
			<?php include_once(APPPATH . 'views/_right_panel.php') ?>
			
	</div>
	
	<?php include_once(APPPATH . 'views/_footer.php') ?>
</div>
<script type="text/javascript">
// Cache the elements we'll need
var menu = $('#cssmenu');
var menuList = menu.find('ul:first');
var listItems = menu.find('li').not('#responsive-tab');



// Toggle menu visibility
menu.on('click', '#responsive-tab', function(){
	listItems.slideToggle('fast');
	listItems.addClass('collapsed');
});
</script>
</body>

</html>