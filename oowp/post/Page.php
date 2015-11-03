<?php
namespace oowp\post;

use InvalidArgumentException;

use oowp\post\support\Revisions;
use oowp\post\support\IRevisions;

class Post extends HierarchicalCorePostObject implements IRevisions {
    use Revisions;

    protected function constructor($postID) {
        // Check the type
        $postType = $this->getPostType();

        if ($this->isRevision()) {
            $postType = $this->getCurrentRevision()->getPostType();
        }

        if ($postType !== "page") {
            throw new InvalidArgumentException(
                "The id \"$id\" is not a valid id for a " .
                "post of type \"page\" or a revision for a post of type \"page\"."
            );
        }
    }
}
