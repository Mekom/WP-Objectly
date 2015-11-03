<?php
namespace oowp\post\support;

trait Revisions {
    /**
     * Get all revisions for this post
     *
     * @return PostObject[] An array of revisions for this post. Empty if none.
     */
    public final function getRevisions() {
        $revisions = wp_get_post_revisions($this->getPostID(), array(
            'posts_per_page' => -1
        ));

        $revisionObjects = array();

        foreach($revisions as $revision) {
            $revisionObjects[] = static::fromPostID($revision->ID);
        }

        return $revisionObjects;
    }

    /**
     * Check if this post is a revision
     *
     * @return bool true if this is a revision, false if not
     */
    public final function isRevision() {
        return $this->getPostType() === "revision";
    }

    /**
     * Get the current revision id.
     * Returns the id of the current post if this is not a revision.
     *
     * @return int The ID of the current revision
     */
    public final function getCurrentRevisionID() {
        if (!$this->isRevision()) return $this->getPostID();

        $parentID = wp_get_post_parent_id($this->getPostID());
        if ($parentID === false) {
            throw new RuntimeException(
                "This revision did not have a parent post. " .
                "This should never happen."
            );
        }

        return $parentID;
    }

    /**
     * Get the lates revision.
     * Will return $this if this is the lates revision
     *
     * @throws RuntimeException If the revision has no parent post.
     * @return PostObject The current revision.(Lates post)
     */
    public final function getCurrentRevision() {
        $currentRevisionID = $this->getCurrentRevisionID();
        if ($currentRevisionID === $this->getPostID()) return $this;
        return static::fromPostID($currentRevisionID);
    }
}
