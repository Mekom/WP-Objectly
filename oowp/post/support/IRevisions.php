<?php
namespace oowp\post\support;

interface IRevisions {
    /**
     * Get all revisions for this post
     *
     * @return PostObject[] An array of revisions for this post. Empty if none.
     */
    public function getRevisions();

    /**
     * Check if this post is a revision
     *
     * @return bool true if this is a revision, false if not
     */
    public function isRevision();

    /**
     * Get the current revision id.
     * Returns the id of the current post if this is not a revision.
     *
     * @return int The ID of the current revision
     */
    public function getCurrentRevisionID();

    /**
     * Get the lates revision.
     * Will return $this if this is the lates revision
     *
     * @throws RuntimeException If the revision has no parent post.
     * @return PostObject The current revision.(Lates post)
     */
    public function getCurrentRevision();
}
