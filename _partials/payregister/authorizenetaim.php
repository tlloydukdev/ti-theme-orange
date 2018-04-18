<div class="radio">
    <label>
        <?php if (!$paymentMethod->isApplicable($order->order_total, $paymentMethod)) { ?>
            <input type="radio" name="payment" value="" disabled/>
        <?php } else { ?>
            <input
                type="radio"
                name="payment"
                value="authorizenetaim"
            />
        <?php } ?>
        <?= $paymentMethod->name; ?>
    </label>
    <?php if (!$paymentMethod->isApplicable($order->order_total, $paymentMethod)) { ?>
        <span class="text-info"><?= sprintf(
                lang('sampoyigi.payregister::default.alert_min_order_total'),
                currency_format($paymentMethod->order_total),
                $paymentMethod->name
            ); ?></span>
    <?php } ?>
</div>
<div class="payment-card-icons">
    <i class="fa fa-cc-visa fa-2x"></i>
    <i class="fa fa-cc-mastercard fa-2x"></i>
    <i class="fa fa-cc-amex fa-2x"></i>
    <i class="fa fa-cc-diners-club fa-2x"></i>
    <i class="fa fa-cc-jcb fa-2x"></i>
</div>
<div
    id="authorizeNetAimPaymentForm"
    class="wrap-horizontal"
    data-client-key="<?= $paymentMethod->getClientKey() ?>"
    data-api-login-id="<?= $paymentMethod->getApiLoginID() ?>"
    data-trigger="[name='payment']"
    data-trigger-action="show"
    data-trigger-condition="value[authorizenetaim]"
    data-trigger-closest-parent="form"
>
    <?php foreach ($paymentMethod->getHiddenFields() as $name => $value) { ?>
        <input type="hidden" name="<?= $name; ?>" value="<?= $value; ?>"/>
    <?php } ?>

    <div class="form-group">
        <label for="input-card-number"><?= lang('sampoyigi.payregister::default.authorize_net_aim.label_card_number'); ?></label>
        <div class="input-group">
            <input
                type="text"
                id="authorizenetaim-card-number"
                class="form-control"
                value=""
                placeholder="<?= lang('sampoyigi.payregister::default.authorize_net_aim.text_cc_number'); ?>"
                autocomplete="off"
                required
            />
            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-7 col-md-7">
            <div class="form-group">
                <label for="input-expiry-month"><?= lang('sampoyigi.payregister::default.authorize_net_aim.label_card_expiry'); ?></label>
                <div class="row">
                    <div class="col-xs-6 col-lg-6">
                        <input
                            type="text"
                            class="form-control"
                            id="authorizenetaim-expiry-month"
                            value=""
                            placeholder="<?= lang('sampoyigi.payregister::default.authorize_net_aim.text_exp_month'); ?>"
                            autocomplete="off"
                            required
                        />
                    </div>
                    <div class="col-xs-6 col-lg-6">
                        <input
                            type="text"
                            class="form-control"
                            id="authorizenetaim-expiry-year"
                            value=""
                            placeholder="<?= lang('sampoyigi.payregister::default.authorize_net_aim.text_exp_year'); ?>"
                            autocomplete="off"
                            required
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-5 col-md-5 pull-right">
            <div class="form-group">
                <label for="input-card-cvc"><?= lang('sampoyigi.payregister::default.authorize_net_aim.label_card_cvc'); ?></label>
                <input
                    type="text"
                    class="form-control"
                    id="authorizenetaim-card-cvc"
                    value=""
                    placeholder="<?= lang('sampoyigi.payregister::default.authorize_net_aim.text_cc_cvc'); ?>"
                    autocomplete="off"
                    required
                />
            </div>
        </div>
    </div>
    <div class="form-group">
        <input
            type="text"
            class="form-control"
            id="authorizenetaim-postcode"
            value=""
            placeholder="<?= lang('sampoyigi.cart::default.checkout.label_postcode'); ?>"
        />
    </div>

    <div id="authorizenetaim-errors" class="text-danger"></div>
</div>