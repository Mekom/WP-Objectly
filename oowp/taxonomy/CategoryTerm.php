<?php
namespace oowp\taxonomy;

class CategoryTerm extends TaxonomyTerm {
    /* -------------------- */
    /* # STATIC INTERFACE # */
    /* -------------------- */

    public static function getTaxonomy() {
        return Category::instance();
    }

    /* ---------------------- */
    /* # INSTANCE INTERFACE # */
    /* ---------------------- */
}
