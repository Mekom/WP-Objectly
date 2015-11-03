<?php
namespace oowp\post\support;

trait Autosave {
    /**
     * Get the auto saved revision.
     *
     * @throws RuntimException (unlikley) If a post has more than one autosave
     *
     * @return Revision|null The autosave revision, or null if none.
     */
    public final function getAutosave() {
        $posts = get_posts(array(
            'post_type' => 'revision',
            'post_name' => $this->getPostID() . "-autosave"
        ));

        $postsCount = count($posts);

        if ($postsCount === 0) return null;
        if ($postsCount !== 1) {
            throw new RuntimeException(
                "Post(postID:" . $this->getPOstID() . ") had more than one autosave."
            );
        }

        $post = $posts[0];

        return Revision::fromPostID($post->ID);
    }
}
