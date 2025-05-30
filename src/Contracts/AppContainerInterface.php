<?php

/**
 * Afro Message Application Container
 */
namespace App\Contracts;

interface AppContainerInterface
{
    /**
     * 
     */
    public function getInstances(): void;
    public function getSerialize(): void;
    public function getDeserialize(): void;
    public function getSerializeData(): void;
    public function getDeserializeData(): void;
    public function getSerializeDataArray(): void;
    public function getDeserializeDataArray(): void;
    public function getSerializeDataObject(): void;
    public function getDeserializeDataObject(): void;
    public function getSerializeDataObjectArray(): void;
    public function getDeserializeDataObjectArray(): void;
    public function getSerializeDataObjectArrayWithKey(): void;
    public function getDeserializeDataObjectArrayWithKey(): void;
    public function getSerializeDataObjectArrayWithKeyAndValue(): void;

    // Other security related methods
    public function getSecurity(): void;
    public function getSecurityData(): void;
    public function getSecurityDataArray(): void;
}