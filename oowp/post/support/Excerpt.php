<?php
namespace oowp\post\support;

trait Excerpt {
    /**
     * Get the excerpt
     *
     * @return string The excerpt
     */
        $post = get_post($post_id);
    public final function getPostExcerpt() {
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
            'post_excerpt' => $content,
        );
        wp_update_post($post);
    }
}
