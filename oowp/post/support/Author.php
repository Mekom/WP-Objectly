<?php
namespace oowp\post\support;

use oowp\user\User;

trait Author {
    /**
     * Get the author
     *
     * @return oowp\user\User The author
     */
    public final function getAuthor() {
        $authorID = get_post_field( 'post_author', $this->getPostID() );
        return User::fromUserID($authorID);
    }

    /**
     * Set the author
     *
     * @param User $user The new author
     * @return void
     */
    public final function setAuthor(User $user) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_author'  => $user->getUserID(),
        );
        wp_update_post($post);
    }
}
