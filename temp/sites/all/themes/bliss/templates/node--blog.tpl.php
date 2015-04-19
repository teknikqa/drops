<?php
// $Id$
/**
 * @file
 * Output for nodes.
 */

hide($content['comments']);
hide($content['links']);
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if(!empty($user_picture) || !$page || (!empty($submitted) && $display_submitted)): ?>
  <header class="clearfix<?php $user_picture ? print ' with-picture' : ''; ?>">
    <?php print $user_picture; ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php if ($display_submitted): ?>
      <span class="meta" role="contentinfo">
      <?php if ($submitted): ?>
       <div class="date-in-parts">
         <span class="day"><?php  echo date("j", $node->created); ?></span>
         <span class="month"><?php echo date("M", $node->created); ?></span>
         <span class="year"><?php echo date("Y", $node->created); ?></span>
      </div><!--//date-in-parts -->
      <?php endif; ?>
      </span>
    <?php endif; ?>
    <?php if (!empty($content['field_tags'])): ?>
      <?php print render($content['field_tags']);  ?>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="content clearfix">
    <?php print render($content); ?>
  </div>
  <?php if (!empty($content['links'])): ?>
  <?php // Remove read more and user's blog links   ?>
  <?php unset($content['links']['node']['#links']['node-readmore']); ?>
  <?php unset($content['links']['blog']['#links']['blog_usernames_blog']); ?>
    <footer>
      <nav class="links">
        <?php print render($content['links']); ?>
      </nav>
    </footer>
  <?php endif; ?>
</article>

<?php if ($content['comments'] && $page): ?>
<section class="comments">
  <?php print render($content['comments']); ?>
</section>
<?php endif; ?>
