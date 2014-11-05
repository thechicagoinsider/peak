<?php if ($this['config']->get('article')=='tm-article-blog') : ?>
<article class="uk-article" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>

	<div class="uk-grid">

		<?php if ($image && $image_alignment == 'none') : ?>

		<div class="uk-width-1-1 uk-width-medium-1-3 uk-text-center">
			<?php if ($url) : ?>
				<a href="<?php echo $url; ?>" class="tm-article-image uk-border-circle" style="background-image:url(<?php echo $image; ?>);"></a>
			<?php else : ?>
				<div class="tm-article-image" style="background-image:url(<?php echo $image; ?>);"></div>
			<?php endif; ?>

		</div>

		<div class="uk-width-1-1 uk-width-medium-2-3">
			<?php if ($title) : ?>
				<h1 class="uk-article-title">
					<?php if ($url && $title_link) : ?>
						<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
					<?php else : ?>
					<?php echo $title; ?>
					<?php endif; ?>
				</h1>
			<?php endif; ?>
			<?php else : ?>

			<div class="uk-width-1-1">
				<?php if ($title) : ?>
				<h1 class="uk-article-title">
					<?php if ($url && $title_link) : ?>
						<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
					<?php else : ?>
					<?php echo $title; ?>
					<?php endif; ?>
				</h1>

			<?php endif; ?>

			<?php endif; ?>

			<?php echo $hook_aftertitle; ?>

			<?php if ($author || $date) : ?>
			<p class="uk-article-meta">

				<?php

					$author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
					$date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'" pubdate>'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';

					if($author && $date) {
						printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
					} elseif ($author) {
						printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
					} elseif ($date) {
						printf(JText::_('TPL_WARP_META_DATE'), $date);
					}

				?>

			</p>
			<?php endif; ?>

			<?php echo $hook_aftertitle; ?>

			<?php if ($image && $image_alignment != 'none') : ?>
				<?php if ($url) : ?>
					<a class="uk-align-<?php echo $image_alignment; ?>" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
				<?php else : ?>
					<img class="uk-align-<?php echo $image_alignment; ?>" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				<?php endif; ?>
			<?php endif; ?>

			<?php echo $hook_beforearticle; ?>

			<?php if ($article) : ?>
			<div class="tm-article">
				<?php echo $article; ?>
			</div>
			<?php endif; ?>

			<?php if ($category) : ?>
			<p class="uk-text-small">

				<?php

					$category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

					if ($category) {
						echo ' ';
						printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
					}

				?>

			</p>
			<?php endif; ?>

			<?php if ($more) : ?>
				<a class="uk-margin-top uk-button uk-button-small" href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a>
			<?php endif; ?>

			<?php if ($tags) : ?>
			<p class="uk-float-left"><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
			<?php endif; ?>

			<?php if ($edit) : ?>
			<p><?php echo $edit; ?></p>
			<?php endif; ?>

			<?php if ($previous || $next) : ?>
			<ul class="uk-pagination">
				<?php if ($previous) : ?>
				<li class="uk-pagination-previous">
					<?php echo $previous; ?>
					<i class="uk-icon-arrow-left"></i>
				</li>
				<?php endif; ?>

				<?php if ($next) : ?>
				<li class="uk-pagination-next">
					<?php echo $next; ?>
					<i class="uk-icon-arrow-right"></i>
				</li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>

			<?php echo $hook_afterarticle; ?>

		</div>
	</div>

</article>
<?php else : ?>


<article class="uk-article" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>

	<?php if ($image && $image_alignment == 'none') : ?>
		<?php if ($url) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($title) : ?>
		<h1 class="uk-article-title">
			<?php if ($url && $title_link) : ?>
				<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
			<?php else : ?>
				<?php echo $title; ?>
			<?php endif; ?>
		</h1>
		<?php endif; ?>

		<?php echo $hook_aftertitle; ?>

		<?php if ($author || $date) : ?>
		<p class="uk-article-meta">

			<?php

				$author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
				$date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'" pubdate>'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';

				if($author && $date) {
					printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
				} elseif ($author) {
					printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
				} elseif ($date) {
					printf(JText::_('TPL_WARP_META_DATE'), $date);
				}

			?>

		</p>
		<?php endif; ?>

	<?php echo $hook_aftertitle; ?>

	<?php if ($image && $image_alignment != 'none') : ?>
		<?php if ($url) : ?>
			<a class="uk-align-<?php echo $image_alignment; ?>" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img class="uk-align-<?php echo $image_alignment; ?>" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php echo $hook_beforearticle; ?>

	<?php if ($article) : ?>
	<div>
		<?php echo $article; ?>
	</div>
	<?php endif; ?>

	<?php if ($category) : ?>
	<p class="uk-text-small">

		<?php

			$category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

			if ($category) {
				echo ' ';
				printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
			}

		?>

	</p>
	<?php endif; ?>

	<?php if ($tags) : ?>
	<p><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
	<?php endif; ?>

	<?php if ($more) : ?>
	<p>
		<a class="uk-button" href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a>
	</p>
	<?php endif; ?>

	<?php if ($edit) : ?>
	<p><?php echo $edit; ?></p>
	<?php endif; ?>

	<?php if ($previous || $next) : ?>
	<ul class="uk-pagination">
		<?php if ($previous) : ?>
		<li class="uk-pagination-previous">
			<?php echo $previous; ?>
			<i class="uk-icon-arrow-left"></i>
		</li>
		<?php endif; ?>

		<?php if ($next) : ?>
		<li class="uk-pagination-next">
			<?php echo $next; ?>
			<i class="uk-icon-arrow-right"></i>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>

	<?php echo $hook_afterarticle; ?>

</article>

<?php endif; ?>