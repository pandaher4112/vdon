<?php get_header(); ?>
<!-- 固定ページを表示するための設定 -->	
	<!-- タイトルを表示させる場合はh2タグで追加すると表示される -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php remove_filter ('the_content', 'wpautop'); ?> <!--Pタブが自動的に入らないように設定-->
	<?php the_content(); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
