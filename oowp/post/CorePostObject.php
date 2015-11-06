<?php
namespace oowp\post;

use oowp\post\support\Author;
use oowp\post\support\IAuthor;
use oowp\post\support\Excerpt;
use oowp\post\support\IExcerpt;
use oowp\post\support\Content;
use oowp\post\support\IContent;
use oowp\post\support\CustomFields;
use oowp\post\support\ICustomFields;
use oowp\post\support\Title;
use oowp\post\support\ITitle;
use oowp\post\support\Slug;
use oowp\post\support\ISlug;

/**
 * Represents one of the core post objects
 * post, page, attachment, and revision.
 */
class CorePostObject extends PostObject implements
    IAuthor, ICustomFields, IExcerpt, IContent, ISlug, ITitle {
    use Author;
    use Excerpt;
    use Content;
    use CustomFields;
    use Slug;
    use Title;
}