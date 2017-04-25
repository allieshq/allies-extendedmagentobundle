<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

use Oro\Bundle\MagentoBundle\ImportExport\Converter\CartItemDataConverter as BaseCartItemDataConverter;

class CartItemDataConverter extends BaseCartItemDataConverter
{
    /**
     * {@inheritdoc}
     */
    protected function getHeaderConversionRules()
    {
        $return = array_merge(
            parent::getHeaderConversionRules(),
            [
                'applied_rule_ids' => 'appliedRuleIds',
                'additional_data' => 'additionalData',
                'is_qty_decimal' => 'isQtyDecimal',
                'no_discount' => 'noDiscount',
                'discount_percent' => 'discountPercent',
                'row_total_with_discount' => 'rowTotalWithDiscount',
                'row_weight' => 'rowWeight',
                'tax_before_discount' => 'taxBeforeDiscount',
                'original_custom_price' => 'originalCustomPrice',
                'row_total_incl_tax' => 'rowTotalInclTax', 
                'hidden_tax_amount' => 'hiddenTaxAmount',
                'surcharge_amount' => 'surchargeAmount',
                'row_total_before_redemptions' => 'rowTotBeforeRedemptions',
                'row_total_before_redemptions_incl_tax' => 'rowTotBeforeRedemptionsIncTax',
                'row_total_after_redemptions' => 'rowTotAfterRedemptions',
                'row_total_after_redemptions_incl_tax' => 'rowTotAfterRedemptionsIncTax',
            ]
        );

        return $return;
    }
    
    /**
     * {@inheritdoc}
     */
    public function convertToImportFormat(array $importedRecord, $skipNullValues = true)
    {
        $return = parent::convertToImportFormat($importedRecord, $skipNullValues);
        
        // Bool
        foreach (['isQtyDecimal','noDiscount'] as $k) {
            if (array_key_exists($k, $return)) {
                $return[$k] = (int)(bool)$return[$k];
            }
        }
        // Float or null
        foreach (['rowTotalWithDiscount','originalCustomPrice','rowTotalInclTax','hiddenTaxAmount','surchargeAmount','rowTotBeforeRedemptions','rowTotBeforeRedemptionsIncTax','rowTotAfterRedemptions','rowTotAfterRedemptionsIncTax'] as $k) {
            if (array_key_exists($k, $return)) {
                $return[$k] = ('' === $return[$k]) ? null : (float)$return[$k];
            }
        }
        
        return $return;
    }
}