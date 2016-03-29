<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

use OroCRM\Bundle\MagentoBundle\ImportExport\Converter\OrderItemDataConverter as BaseOrderItemDataConverter;

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
}