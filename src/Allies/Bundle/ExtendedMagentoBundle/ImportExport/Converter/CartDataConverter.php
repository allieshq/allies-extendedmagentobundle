<?php

namespace Allies\Bundle\ExtendedMagentoBundle\ImportExport\Converter;

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
}