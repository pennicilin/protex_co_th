<?php

// echo "test";
echo '<div class="header-article">
						<div class="health-head">'.$model->section->get()->name.'</div><a class="btn-more" href="#" target="_blank">อ่านต่อ</a>
				</div>
				<div id="article-view">
					<ul>';
						
					foreach($model->article->get() as $article){

						$image_properties = array(

								"src" => "images/article/" . $article->image_name,

								"width"=>"160", 

							);


						echo '<li>
							<div class="img-article">'.img($image_properties).'</div>
							<div class="text-article"><h2>'.$article->title.'</h2>'.'<p>'.word_limiter($article->detail,10).'</p></div>
						</li>';

					}
echo '</ul></div>';