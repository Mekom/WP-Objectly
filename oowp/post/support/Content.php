<?php
namespace oowp\post\support;

trait Content {
    /**
     * Get the post content
     *
     * @return string the content
     */
    public final function getPostContent() {
        $post = get_post($this->getPostID());
        return $post->post_content;
    }

    /**
     * Set the post content
     *
     *
     * @param string $content The new content
     * @return void
     */
    public final function setPostContent($content) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_content' => $content,
        );
        wp_update_post( $post );
    }
}
