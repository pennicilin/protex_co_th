<div id="header">
		<div id="sub-header">
			<div id="logo"><img src="<?php echo base_url();?>images/logo.png" width="196" height="68"></div>
				<div id="cssmenu" class="top-menu">
					<ul id="nav">
						
					<li class='active'><a href='<?php echo base_url();?>contents'><span>หน้าแรก</span></a></li>
					<li id="product" class='has-sub'><a href='#'><span>ผลิตภัณฑ์</span></a>
						<ul class="level-2">
							<li class="mega">
								<ul class="family-bar">

									<?php

										$product_section = new Product_section();

										$product_section->get();

										foreach($product_section as $section){


										
									?>
										<li id="sub-<?php echo $section->uri?>">
											

											<?php
												foreach($section->product_category->publish()->get() as $category){


													echo anchor('products/'.$section->uri.'/'.$category->uri, $category->name, array('title'=>$category->name));
												}
											?>
											

										</li>
									<?php
										}
									?>
									<!-- <li id="sub-men">
									<a href="#">สบู่เหลวล้างมือ</a>
									<a href="#">สบู่ก้อน</a>
									<a href="#">ครีมอาบน้ำ</a>
									<a href="#">แป้งเย็น</a>
									</li> -->
								</ul>
							</li>
						</ul>
					</li>
					<!-- <li class='has-sub'><a href='<?php echo base_url();?>health'><span>เรื่องผิวและสุขภาพ</span></a>
						<ul>
							<li>
								<a href='<?php echo base_url();?>about'><span>สำหรับผู้หญิง</span></a>
							</li>
							<li>
								<a href='<?php echo base_url();?>about'><span>สำหรับผู้ชาย</span></a>
							</li>
							<li>
								<a href='<?php echo base_url();?>about'><span>งานวิจัย</span></a>
							</li>
						</ul>
					</li>
					<li class='last'><a href='<?php echo base_url();?>activity'><span>ข่าวสาร &amp; กิจกรรม</span></a></li>
					<li class='last'><a href='<?php echo base_url();?>about'><span>เกี่ยวกับเรา</span></a></li>	 -->
					

					<?php
						
						$Section = new Section();

						$Section->order_by('sort')->get_where('uri <> "index"');

						foreach($Section as $menulist){
							

							$category = $menulist->category->publish()->order_by('sort')->get();
							
							// echo 'count-> '.$category->result_count();
							$class = ""; $submenu_ul = "";
							if($category->result_count() > 0 && $menulist->uri != 'aboutus'){

								$class = "has-sub";
								$submenu_ul = "<ul class='sub'>";
								foreach($category as $submenu){

									// echo 'count-> ' . $submenu->result_count() . '<br>';
									$submenu_ul .= "
													<li>
														<a href='" . base_url() ."contents/". $menulist->uri . "/" . $submenu->uri . "'><span>" . $submenu->name . "</span></a>
													</li>
													
												";
								}

								$submenu_ul .= "</ul>";

							}
							
							if($menulist->uri != "aboutus"){

								$href = "#";

							}else{

								$href = base_url() . "contents/".$menulist->uri;

							}

							echo "<li class='".$class."'><a href='".$href."'><span>" . $menulist->name . "</span></a>"
							. $submenu_ul
							."</li>";

							
						}
					?>
					

					</ul>
				</div>
			</div>
	</div>