<?php
/**
 * File containing the LegacyConverter class.
 */
namespace xrow\XrowGisBundle\FieldType\XrowGpx;

use eZ\Publish\Core\Persistence\Legacy\Content\FieldValue\Converter;
use eZ\Publish\Core\Persistence\Legacy\Content\StorageFieldDefinition;
use eZ\Publish\Core\Persistence\Legacy\Content\StorageFieldValue;
use eZ\Publish\SPI\Persistence\Content\FieldValue;
use eZ\Publish\SPI\Persistence\Content\Type\FieldDefinition;

class XrowGpxConverter implements Converter
{
    public static function create()
    {
        return new self;
    }

    public function toStorageValue( FieldValue $value, StorageFieldValue $storageFieldValue )
    {

    }

    public function toFieldValue( StorageFieldValue $value, FieldValue $fieldValue )
    {

    }

    public function toStorageFieldDefinition( FieldDefinition $fieldDef, StorageFieldDefinition $storageDef )
    {

    }

    public function toFieldDefinition( StorageFieldDefinition $storageDef, FieldDefinition $fieldDef )
    {

    }

    public function getIndexColumn()
    {
        return false;
    }
}