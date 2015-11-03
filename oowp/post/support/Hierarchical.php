<?php
namespace oowp\post\support;

use oowp\post\PostObject;

trait Hierarchical {
    /**
     * Get the parent post of this post
     *
     * @return PostObject|null The post parent, or null if this post has no parent
     */
    public final function getPostParent() {
        $parentID = wp_get_post_parent_id($this->getPostID());
        if ($parentID === 0) return null;
        return static::fromPostID($parentID);
    }

    /**
     * Get the post children of this post
     *
     * @return PostObject The children
     */
    public final function getPostChildren() {
        $args = array(
            'posts_per_page'   => -1,

            // This is just for safty
            // A post should never have a child of a different
            // post type
            'post_type'        => $this->getPostType(),
            'post_parent'      => $this->getPostID(),
        );
        $posts = get_posts($args);
        $postObjects = array();
        foreach($posts as $post) {
            $postObjects[] = static::fromPostID($post->ID);
        }
    }

    /**
     * Set the parent of a post
     *
     * @param PostObject $parent The new parent
     * @return void
     */
    public final function setPostParent(PostObject $parent) {
        wp_update_post(
            array(
                'ID' => $this->getPostID(),
                'post_parent' => $parent->getPostID()
            )
        );
    }
}
