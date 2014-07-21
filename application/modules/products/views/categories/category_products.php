<?php

			// $this->load->library('javascript');
 		// 	$this->load->library('jquery');
			// echo $library_src;
 			/*$this->jquery->_click('#img-men', function(){
products/'.$model->product_section_uri.'/'.$model->uri . '/' . $item->uri
 				alert("");
 			});*/

			$content_id = $this->uri->segment(2);

?>
				<style>
					.line-art{

						margin: 0 0 0 200px;
					}

					#right-panel{

						 margin-left: 20px;
    					 width: 268px;
					}
				</style>

				<h2 style="text-align:left;">รายละเอียดผลิตภัณฑ์</h2>


				<!-- <div class="dock" id="dock2">
				  <div class="dock-container2">
				  <a class="dock-item2" href="#"><span>Home</span><img src="images/home.png" alt="home" /></a> 
				  <a class="dock-item2" href="#"><span>Contact</span><img src="images/email.png" alt="contact" /></a> 
				  <a class="dock-item2" href="#"><span>Portfolio</span><img src="images/portfolio.png" alt="portfolio" /></a> 
				  <a class="dock-item2" href="#"><span>Music</span><img src="images/music.png" alt="music" /></a> 
				  <a class="dock-item2" href="#"><span>Video</span><img src="images/video.png" alt="video" /></a> 
				  <a class="dock-item2" href="#"><span>History</span><img src="images/history.png" alt="history" /></a> 
				  <a class="dock-item2" href="#"><span>Calendar</span><img src="images/calendar.png" alt="calendar" /></a> 
				  <a class="dock-item2" href="#"><span>Links</span><img src="images/link.png" alt="links" /></a> 
				  <a class="dock-item2" href="#"><span>RSS</span><img src="images/rss.png" alt="rss" /></a> 
				  <a class="dock-item2" href="#"><span>RSS2</span><img src="images/rss2.png" alt="rss" /></a> 
				  </div>
				</div> -->


					<div id="content-<?php echo $content_id; ?>" style="display:none;"><?php //echo $model->description ?></div>

					<div id="img-<?php echo $content_id; ?>" style="height:265px;">
					<div class="dock" id="dock2">
						
						<?php 

						echo "<div  id='' class='dock-container2' >";

						// for($i=0; $i<3; $i++){

							foreach($model->product_item->publish()->get() as $item ){

								//echo  "<a class='dock-item2' href='#'>" . "<div class='producttooltip'>".$item->name."<div class='arrow'></div></div>" 

								echo anchor('#',"<span class=''>". $item->name ."<div class='arrow'></div></span>".

									img(array(

										'src' => 'images/products/'  .$model->product_section->get()->uri . '/' . $model->uri .'/'. $item->image_name, 
										/*'width'=>'719', 
										'height'=>'285'*/

									)),array('class'=>'dock-item2','rel'=>'p-'.$item->id));

								// echo "</a>";

							}

						// }

						echo "</div>";


						?>

					<script>
						$(document).ready(function() {
						 
						  var keepdata;

						 //  $("#product-carousel").owlCarousel();

						 //  $("#product-carousel a").click(function(){

						 //  		return false;
						 //  });

						  

						 // // Send ajax request to get product details in category for using in slider plugin url: /products/section/category

						  $.getJSON('<?php echo base_url()."products/".$model->product_section->get()->uri."/".$model->uri; ?>', function(data) {
						  	/*optional stuff to do after success */

						  	keepdata = data;

						  	//$("#product-carousel").on("mouseover",".owl-item", function(e){
						  $("#dock2").on("mouseover",".dock-item2", function(e){
							    //var _id = $(this).find("a").attr("rel");
							    var _id = $(this).attr("rel");
							    var _data = keepdata[_id];
							    var _html = "<h2 style='text-align:left;'>"
							    +_data['category_name']+"</h2><p style='color: #088A4B;'>"+_data['name']

							    +"</p><p style='margin-top: 30px;'><img width='100' align='left' vspace='45' hspace='45' style='margin-right: 30px;'' src='../../images/products/"

							    +_data['section']

							    +'/'+_data['category'] + '/'

							    +_data['image_name']+"'>"+_data['desc']+"</p>"

							    +"<p style='text-align: right;'>"

							    +"<a href='<?php echo base_url()?>contents/health/<?php echo $this->uri->segment(2)?>'>"
							    +"<img src='../../images/related_article_button.gif' />"
							    +"</a>"

							    +"</p>";
							    // $('.desc').html(_data['desc']);
							    // 
							    $('.desc').html(_html);
							});
						  	
						  });

						  

						 //  var max = $(".owl-item").length;
						 //  if( max < 5){
						 //  	$(".owl-wrapper").width(134 * 5).css("text-align","center");
						 //  	$(".owl-item").css({"display":"inline-block", "float":"none"});
						 //  }
						 
						});
					</script>
<script type="text/javascript" src="../../js/interface.js"></script>
<link href="../../css/dockmenu.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
	<style type="text/css">
   		.dock img { behavior: url(iepngfix.htc) }
   </style>
<![endif]-->


<script type="text/javascript">
   $(document).ready(
	   function()
	   {
		   $('#dock2').Fisheye(
			   {
				   maxWidth: 50,
				   items: 'a',
				   itemsText: 'span',
				   container: '.dock-container2',
				   itemWidth: 70,
				   proximity: 120,
				   alignment : 'left',
				   valign: 'bottom',
				   halign : 'center'
			   }
		   )
	   }
   );
</script>
				
				</div>
				</div>
				
				<div class="desc" style="padding-bottom:100px;"></div>
				
				