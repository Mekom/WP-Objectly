<?php
namespace oowp\taxonomy;

class Category extends Taxonomy {

    public function getTaxonomySlug() {
        return "category";
    }


    public function toTerm($termID) {
        return CategoryTerm::fromTermID($termID);
    }
}
