<?php
namespace oowp\tests\tests\taxonomy;

use oowp\taxonomy\Category;

use oowp\tests\OOWPTestCase;

class CategoryTest extends OOWPTestCase {

    public function testSingleton() {
        $category = Category::instance();

        $this->assertTrue($category instanceof Category);
        $this->assertEquals($category->getTaxonomySlug(), "category");
    }

    public function testGetTerms() {
        $terms = Category::instance()->getTerms();

        $this->assertEquals(
            1,
            count($terms),
            "Unexpected number of temrs"
        );

        $this->assertInstanceOf(
            'oowp\taxonomy\CategoryTerm',
            $terms[0],
            "Item in \$term was not a CategoryTerm"
        );
    }
}
