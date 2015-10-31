<?php
namespace oowp\tests\tests\taxonomy;

use oowp\taxonomy\CategoryTerm;

use oowp\tests\OOWPTestCase;

class CategoryTermTest extends OOWPTestCase {

    public function testFromTermID() {
        $term = CategoryTerm::fromTermID(1);

        $this->assertEquals(
            "category",
            $term->getTaxonomy()->getTaxonomySlug()
        );
    }

    public function testFromTermSlug() {
        $term = CategoryTerm::fromTermSlug('uncategorized');

        $this->assertEquals(
            "category",
            $term->getTaxonomy()->getTaxonomySlug()
        );
    }

    public function testFromTermName() {
        $term = CategoryTerm::fromTermName('Uncategorized');

        $this->assertEquals(
            "category",
            $term->getTaxonomy()->getTaxonomySlug()
        );
    }

    public function testOutOfBoundFromID() {
        $term = CategoryTerm::fromTermID(9999999999999);

        $this->assertEquals(
            null,
            $term
        );
    }

    public function testOutOfBoundFromSlug() {
        $term = CategoryTerm::fromTermSlug(
            "fdbshvdcscndilsbrrjlfdsncjdklslbsgfhjds"
        );

        $this->assertEquals(
            null,
            $term
        );
    }

    public function testOutOfBoundFromName() {
        $term = CategoryTerm::fromTermName(
            "fdbshvdcscndilsbrrjlfdsncjdklslbsgfhjds"
        );

        $this->assertEquals(
            null,
            $term
        );
    }

    public function testGetTermID() {
        $term = CategoryTerm::fromTermID(1);
        $this->assertEquals(
            1,
            $term->getTermID()
        );
    }

    public function testGetTermName() {
        $term = CategoryTerm::fromTermID(1);
        $this->assertEquals(
            "Uncategorized",
            $term->getTermName()
        );
    }

    public function testGetTermSlug() {
        $term = CategoryTerm::fromTermID(1);
        $this->assertEquals(
            "uncategorized",
            $term->getTermSlug()
        );
    }

    public function testGetTermDescription() {
        $term = CategoryTerm::fromTermID(1);
        $this->assertEquals(
            "",
            $term->getTermDescription()
        );
    }

    public function testGetTermParent() {
        $term = CategoryTerm::fromTermID(1);
        $this->assertEquals(
            0,
            $term->getTermParent()
        );
    }

    public function testGetTermPostCount() {
        $term = CategoryTerm::fromTermID(1);
        $this->assertEquals(
            0,
            $term->getTermPostCount()
        );
    }

}
