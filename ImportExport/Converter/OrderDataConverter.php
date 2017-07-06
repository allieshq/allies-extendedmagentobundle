<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

use Oro\Bundle\UserBundle\Model\Gender;
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
                'rewards_discount_tax_amount' => 'rewardsDiscountTaxAmount',
                'customer_gender' => 'customerGender',
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
        foreach (['hiddenTaxAmount','shippingTaxAmount','shippingHiddenTaxAmount','shippingInclTax','surchargeAmount','subtotalInclTax','rewardsDiscountAmount','rewardsDiscountTaxAmount'] as $k) {
            if (array_key_exists($k, $return)) {
                $return[$k] = ('' === $return[$k]) ? null : (float)$return[$k];
            }
        }
        
        if (!empty($return['customerGender'])) {
            $return['customerGender'] = $this->getOroGender($return['customerGender']);
        }
        
        return $return;
    }

    /**
     * Lifted from OroMagentoBundle:CustomerDataConverter
     * This is such a hack, Oro
     * 
     * @param string|int $gender
     * @return null|string
     */
    protected function getOroGender($gender)
    {
        if (is_numeric($gender)) {
            if ($gender == 1) {
                $gender = Gender::MALE;
            }
            if ($gender == 2) {
                $gender = Gender::FEMALE;
            }
        } else {
            $gender = strtolower($gender);
            if (!in_array($gender, [Gender::FEMALE, Gender::MALE], true)) {
                $gender = null;
            }
        }

        return $gender;
    }

}