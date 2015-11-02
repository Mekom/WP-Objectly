<?php
namespace oowp\post\support;

trait Excerpt {
    /**
     * Get the excerpt
     *
     * @return string The excerpt
     */
    public final function getExcerpt() {
        $post = get_post($post_id);
        return $post->post_excerpt;
    }

    /**
     * Set the excerpt
     *
     * @param string $excerpt The new excerpt
     * @return void
     */
    public final function setExcerpt($excerpt) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_excerpt' => $content,
        );
        wp_update_post($post);
    }
}
