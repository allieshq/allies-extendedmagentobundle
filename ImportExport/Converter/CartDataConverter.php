<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

use Oro\Bundle\UserBundle\Model\Gender;
use Oro\Bundle\MagentoBundle\ImportExport\Converter\CartDataConverter as BaseCartDataConverter;

class CartDataConverter extends BaseCartDataConverter
{
    /**
     * {@inheritdoc}
     */
    protected function getHeaderConversionRules()
    {
        $return = array_merge(
            parent::getHeaderConversionRules(),
            [
                'is_active' => 'isActive',
                'is_virtual' => 'isVirtual',
                'is_multi_shipping' => 'isMultiShipping',
                'is_persistent' => 'isPersistent',
                
                'checkout_method' => 'checkoutMethod',
                
                'customer_prefix' => 'customerPrefix',
                'customer_middlename' => 'customerMiddlename',
                'customer_suffix' => 'customerSuffix',
                'customer_dob' => 'customerDob',
                'customer_note' => 'customerNote',
                'customer_taxvat' => 'customerTaxvat',
                'customer_gender' => 'customerGender',
                
                'remote_ip' => 'remoteIp',
                'applied_rule_ids' => 'appliedRuleIds',
                'reserved_order_id' => 'reservedOrderId',
                'coupon_code' => 'couponCode',
                
                'subtotal_with_discount' => 'subtotalWithDiscount',
                
                'onestepcheckout_customercomment' => 'oscCustomercomment',
                'onestepcheckoutCustomercomment' => 'oscCustomercomment',
                'onestepcheckout_customerfeedback' => 'oscCustomerfeedback',
                'onestepcheckoutCustomerfeedback' => 'oscCustomerfeedback',
                
                'rewards_points_spending' => 'rewardsPointsSpending',
                'rewards_discount_amount' => 'rewardsDiscountAmount',
                'rewards_discount_tax_amount' => 'rewardsDiscountTaxAmount',
                'rewards_valid_redemptions' => 'rewardsValidRedemptions',
                
                'store_credit_amount_used' => 'storeCreditAmountUsed',
                'use_store_credit' => 'useStoreCredit',
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
        foreach (['isActive','isVirtual','isMultiShipping','isPersistent','useStoreCredit'] as $k) {
            if (array_key_exists($k, $return)) {
                $return[$k] = (int)(bool)$return[$k];
            }
        }
        // Float or null
        foreach (['surchargeAmount', 'subtotalWithDiscount','rewardsPointsSpending','rewardsDiscountAmount','rewardsDiscountTaxAmount','storeCreditAmountUsed'] as $k) {
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