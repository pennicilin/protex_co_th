<?php 
    
    if($this->uri->segment(1) == 'products'){
?>
<style>
   #footer{

         margin-top: 70px;
   }
</style>
<?php
    }
?>
<div id="footer">
		<div class="footer-detail">
			<div class="copyright">© 2011 Copyright Colgate Palmolive Co.,Ltd All Right Reserved. 

                <a target="_blank" href="http://www.colgate.co.th/app/Colgate/TH/TH/Corp/ContactUs/ConsumerAffairs.cvsp">ติดต่อเรา</a>  |  For more information about Colgate-Palmolive please <a target="_blank" href="http://www.colgate.co.th/app/Colgate/TH/TH/Corp/ContactUs/ConsumerAffairs.cvsp">click here</a>
		ลูกค้าสัมพันธ์ โทรฟรี 1-800-800-900 ในช่วงเวลาทำการ 8.00-16.00 น. ทุกวันจันทร์ ถึงวันศุกร์
			</div>
			<div class="social">
            <a href="#">

            	<?php echo anchor(

                        'https://www.facebook.com/ProtexThailand',

                        img(array(

                            'src'=>'images/footer.jpg',
                            'width'=>'233',
                            'height'=>'49'

                        )),

                        array('target' => '_blank')

                    );?>
            	<!-- <img src="images/footer.jpg" width="233" height="49"></a> -->


             </div>
		</div>
		</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&appId=202609959891767&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
