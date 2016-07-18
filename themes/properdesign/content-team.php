<?php

// WP_User_Query arguments
$args = array (

	// Because we're sorting alphabetically by last name and last_name is a meta field
	// We have to declare our meta key
	'meta_key'=>'last_name',

	// Then orderby meta_value
	'orderby'=>'meta_value',
);

// The User Query
$team_query = new WP_User_Query($args);

// The User Loop
if ( ! empty( $team_query->results ) ): ?>
<ol class="team">
	<?php foreach ( $team_query->results as $user ): 

		$user_name = $user->first_name . ' ' . $user->last_name;
		$user_biog = $user->description;
		$acf_id = 'user_' . $user->ID;
		$user_twitter = get_field('twitter', $acf_id);
		$user_github = get_field('github', $acf_id);
		$user_codepen = get_field('codepen', $acf_id);
	?>

	<li class="team-member">
		<?php echo get_avatar( $user->ID , $size = '256'); ?>
		<h3><?php echo $user_name; ?></h3>
		<p><?php echo $user_biog; ?></p>

		<?php if($user_twitter): ?>
			<a href="http://twitter.com/intent/user?screen_name=<?php echo $user_twitter; ?>"><svg class="icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
		<?php endif;?>

		<?php if($user_github): ?>
			<a href="http://github.com/<?php echo $user_github; ?>"><svg class="icon-github"><use xlink:href="#icon-github"></use></svg></a>
		<?php endif; ?>

		<?php if($user_codepen): ?>
			<a href="http://codepen.io/<?php echo $user_codepen; ?>"><svg class="icon-codepen"><use xlink:href="#icon-codepen"></use></svg></a>
		<?php endif; ?>

	</li>

	<?php endforeach; ?>
</ol>
<?php endif; ?>
