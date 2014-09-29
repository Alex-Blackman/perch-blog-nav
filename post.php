	<?php

		$slug = perch_get('s'); // sets slug to equal postSlug

		$html = perch_blog_post($slug, True);  // stores post in variable to use later

		$data = perch_blog_custom(array(
			'filter'=>'postSlug',
			'match'=>'eq',
			'value'=>$slug,
			'skip-template'=>true, 
		)); // grabs data of current post

		$data = $data[0]; // not sure what this is for but code breaks without it

		$date = $data['postDateTime']; // sets the date variable to the posts published date

		$prev = perch_blog_custom(array(
			'count'=>1,
			'filter'=>'postDateTime',
			'match'=>'lt',
			'sort'=>'postDateTime',
			'sort-order'=>'DESC',
			'value'=>$date,
			'template'=>'blog/post_prev.html'
		), true); // stores prev post in a variable to use later

		$next = perch_blog_custom(array(
			'count'=>1,
			'filter'=>'postDateTime',
			'match'=>'gt',
			'sort'=>'postDateTime',
			'sort-order'=>'ASC',
			'value'=>$date,
			'template'=>'blog/post_next.html'
		), true); // stores next post in a variable to use later

	?>

	<?php
		if ($html) {
			echo $html; // display post
		}

		if (empty($prev)){
			echo '<div class="blog-nav"><a class="disabled">Prev</a>';
		} else {
			echo $prev;
		}

		if (empty($next)){
			echo '<a class="disabled">Next</a></div>';
		} else {
			echo $next;
		}

	?>
