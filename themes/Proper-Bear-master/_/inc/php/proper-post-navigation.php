<?php

//heat_nav uses the standard WP previous and next post links on individual posts or adds pagination links to archive pages (using the Hybrid Loop-Nav function)
//Words the prev/next links in a less brain-twisting way on feed/archive pages

function proper_post_navigation(){
	
	// don't bother for pages
	if(!is_page()): 
		
		//where multiple posts appear use Hybrid loop_pagination
		if(!is_singular()):
			the_posts_pagination();
		
			//otherwise, for single pages, films etc. us WP previous and next post links
			else: ?>
	  		
	  		<nav class="navigation pagination">
	  			<?php previous_post_link('<span class="prev-wrapper">%link</span>'); next_post_link('<span class="next-wrapper">%link</span>');?>
  			</nav>

			<?php endif; ?>
		<?php endif;
	}