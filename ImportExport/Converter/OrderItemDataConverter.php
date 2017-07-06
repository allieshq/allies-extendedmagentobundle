<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

use Oro\Bundle\MagentoBundle\ImportExport\Converter\OrderItemDataConverter as BaseOrderItemDataConverter;

class OrderItemDataConverter extends BaseOrderItemDataConverter
{
    /**
     * {@inheritdoc}
     */
    protected function getHeaderConversionRules()
    {
        return array_merge(
                parent::getHeaderConversionRules(),
                [
                    'price_incl_tax' => 'priceInclTax',
                    'base_cost' => 'baseCost',
                    'row_total_incl_tax' => 'rowTotalInclTax',
                    'hidden_tax_amount' => 'hiddenTaxAmount',
                    'surcharge_amount' => 'surchargeAmount',
                ]
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function convertToImportFormat(array $importedRecord, $skipNullValues = true)
    {
        $return = parent::convertToImportFormat($importedRecord, $skipNullValues);
        
        // Float or null
        foreach (['priceInclTax','baseCost','rowTotalInclTax','hiddenTaxAmount','surchargeAmount'] as $k) {
            if (array_key_exists($k, $return)) {
                $return[$k] = ('' === $return[$k]) ? null : (float)$return[$k];
            }
        }
        
        return $return;
    }
}
