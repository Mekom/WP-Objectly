<?php
namespace oowp\post\support;

trait Slug {
    /**
     * Get the post slug
     *
     * @return string the slug
     */
    public final function getPostSlug() {
        $post = get_post($this->getPostID());
        return $post->post_name;
    }

    /**
     * Set the post slug
     *
     *
     * @param string $slug The new slug
     * @return void
     */
    public final function setPostSlug($slug) {
        $post = array(
            'ID'        => $this->getPostID(),
            'post_name' => $slug,
        );
        wp_update_post( $post );
    }
}
