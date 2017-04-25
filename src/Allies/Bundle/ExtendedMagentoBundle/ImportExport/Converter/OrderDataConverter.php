<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

use Oro\Bundle\MagentoBundle\ImportExport\Converter\OrderDataConverter as BaseOrderDataConverter;

class OrderDataConverter extends BaseOrderDataConverter
{
    /**
     * {@inheritdoc}
     */
    protected function getHeaderConversionRules()
    {
        $return = array_merge(
            parent::getHeaderConversionRules(),
            [
                'coupon_rule_name' => 'couponRuleName',
                'shipping_description' => 'shippingDescription',
                'discount_description' => 'discountDescription',
                'hidden_tax_amount' => 'hiddenTaxAmount',
                'shipping_tax_amount' => 'shippingTaxAmount',
                'shipping_hidden_tax_amount' => 'shippingHiddenTaxAmount',
                'shipping_incl_tax' => 'shippingInclTax',
                'surcharge_amount' => 'surchargeAmount',
                'subtotal_incl_tax' => 'subtotalInclTax',
                'rewards_discount_amount' => 'rewardsDiscountAmount',
                'mailchimp_campaign_id' => 'mailchimpCampaignId',
                'osc_customercomment' => 'oscCustomercomment',
                'osc_customerfeedback' => 'oscCustomerfeedback',
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
        
        // Float or null
        foreach (['hiddenTaxAmount','shippingTaxAmount','shippingHiddenTaxAmount','shippingInclTax','surchargeAmount','subtotalInclTax','rewardsDiscountAmount'] as $k) {
            if (array_key_exists($k, $return)) {
                $return[$k] = ('' === $return[$k]) ? null : (float)$return[$k];
            }
        }
        
        return $return;
    }
}