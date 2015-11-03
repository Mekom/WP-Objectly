<?php
namespace oowp\post;

use oowp\post\support\Hierarchical;
use oowp\post\support\IHierarchical;

class HierarchicalCorePostObject extends CorePostObject implements IHierarchical {
    use Hierarchical;
}