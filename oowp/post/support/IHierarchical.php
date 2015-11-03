<?php
namespace oowp\post\support;

use oowp\post\PostObject;

interface IHierarchical {
    /**
     * Get the parent post of this post
     * @return PostObject The post parent
     */
    public function getPostParent();

    /**
     * Get the post children of this post
     *
     * @return PostObject The children
     */
    public function getPostChildren();

    /**
     * Set the parent of a post
     *
     * @param PostObject $parent The new parent
     * @return void
     */
    public function setPostParent(PostObject $parent);
}
