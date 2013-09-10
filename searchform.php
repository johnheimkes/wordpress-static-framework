<?php
/**
 * Static Framework
 *
 * @category Static_Framework
 * @package Static_Framework
 * @subpackage Search Form
 * @author John Heimkes IV <john@markupisart.com>
 * @version 1.0
 */
?>
<form method="get" action="<?php echo home_url( '/' ); ?>" role="search">
    <input type="search" value="<?php echo esc_attr(get_query_var('s')); ?>" placeholder="Search" name="s" />
    <input type="submit" value="Go" />
</form>