<?php
namespace oowp\post\support;

trait Title {
    /**
     * Get the post title
     *
     * @return string The title
     */
    public final function getPostTitle() {
        return get_the_title($this->getPostID());
    }

    /**
     * Set the post title
     *
     *
     * @param string $title The new title
     * @return void
     */
    public final function setPostTitle($title) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_title'   => $title,
        );
        wp_update_post( $post );
    }
}
