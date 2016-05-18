<?php
/**
 * File containing the XrowGis SearchField class
 */

namespace xrow\XrowGisBundle\FieldType\XrowGis;

use eZ\Publish\SPI\Persistence\Content\Field;
use eZ\Publish\SPI\Persistence\Content\Type\FieldDefinition;
use eZ\Publish\SPI\FieldType\Indexable;
use eZ\Publish\SPI\Search;

/**
 * Indexable definition for XrowGis field type
 */
class SearchField implements Indexable
{
    /**
     * Get index data for field for search backend
     *
     * @param \eZ\Publish\SPI\Persistence\Content\Field $field
     *
     * @return \eZ\Publish\SPI\Search\Field[]
     */
    public function getIndexData( Field $field, FieldDefinition $fieldDefinition )
    {
        $fields = array();
        if ($field->value->externalData["street"]) {
            array_push($fields, $field->value->externalData["street"]);
        }
        if ($field->value->externalData["zip"]) {
            array_push($fields, $field->value->externalData["zip"]);
        }
        if ($field->value->externalData["district"]) {
            array_push($fields, $field->value->externalData["district"]);
        }
        if ($field->value->externalData["city"]) {
            array_push($fields, $field->value->externalData["city"]);
        }
        if ($field->value->externalData["state"]) {
            array_push($fields, $field->value->externalData["state"]);
        }
        if ($field->value->externalData["country"]) {
            array_push($fields, $field->value->externalData["country"]);
        }
        $fields = implode(", ", $fields);
        return array(
            new Search\Field(
                'value_address',
                $fields,
                new Search\FieldType\StringField()
            ),
            new Search\Field(
                'value_location',
                array(
                    "latitude" => $field->value->externalData["latitude"],
                    "longitude" => $field->value->externalData["longitude"]
                ),
                new Search\FieldType\GeoLocationField()
            ),
        );
    }

    /**
     * Get index field types for search backend
     *
     * @return \eZ\Publish\SPI\Search\FieldType[]
     */
    public function getIndexDefinition()
    {
        return array(
            'value_address' => new Search\FieldType\StringField(),
            'value_location' => new Search\FieldType\GeoLocationField()
        );
    }

    /**
     * Get name of the default field to be used for query and sort.
     *
     * As field types can index multiple fields (see MapLocation field type's
     * implementation of this interface), this method is used to define default
     * field for query and sort. Default field is typically used by Field
     * criterion and sort clause.
     *
     * @return string
     */
    public function getDefaultField()
    {
        return "value_address";
    }
	/* (non-PHPdoc)
     * @see \eZ\Publish\SPI\FieldType\Indexable::getDefaultMatchField()
     */
    public function getDefaultMatchField()
    {
        return "value_address";
    }

	/* (non-PHPdoc)
     * @see \eZ\Publish\SPI\FieldType\Indexable::getDefaultSortField()
     */
    public function getDefaultSortField()
    {
        return "value_address";
    }

}
