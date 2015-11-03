<?php
namespace oowp\post\support;

trait Excerpt {
    /**
     * Get the excerpt
     *
     * @return string The excerpt
     */
    public final function getPostExcerpt() {
        $post = get_post($this->getPostID());
        return $post->post_excerpt;
    }

    /**
     * Set the excerpt
     *
     * @param string $excerpt The new excerpt
     * @return void
     */
    public final function setPostExcerpt($excerpt) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_excerpt' => $excerpt,
        );
        wp_update_post($post);
    }
}
