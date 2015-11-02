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
        $parentID = wp_get_post_parent_id($postID);
        if ($parentID === false) return null;
        return static::fromPostID($parentID);
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
