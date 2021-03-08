<?php

// It is a custom validation
add_filter( 'woocommerce_coupon_is_valid', 'ef_woocommerce_coupon_is_valid', 10, 3 );
function ef_woocommerce_coupon_is_valid( $true, $coupon, $that ){
	$sexo = get_user_meta(get_current_user_id(), 'billing_sex', true);
    if(($coupon->code == "diadamulher") && (($sexo == "Feminino") || ($sexo == "F"))){
        $true = true;
    } elseif (($coupon->code == "diadamulher") && (($sexo == "Masculino") || ($sexo == "M") || ($sexo == ""))) {
        $true = false;
    }
    return $true;
}

// Check is valid for product (dont implemented)
add_filter('woocommerce_coupon_is_valid_for_product', 'ef_woocommerce_coupon_is_valid_for_product', 10, 4);
function ef_woocommerce_coupon_is_valid_for_product($valid, $product, $coupon, $values){
    $sexo = get_user_meta(get_current_user_id(), 'billing_sex', true);
    if(($coupon->code == "diadamulher") && (($sexo == "Feminino") || ($sexo == "F"))){
        $valid = true;
    } elseif (($coupon->code == "diadamulher") && (($sexo == "Masculino") || ($sexo == "M") || ($sexo == ""))) {
        $valid = false;
    }
    return $valid;
}

// Custom Message Error
add_filter( 'woocommerce_coupon_error', 'ef_get_coupon_error', 10, 3);
function ef_get_coupon_error($err, $err_code, $coupon){
    $sexo = get_user_meta(get_current_user_id(), 'billing_sex', true);
    if(($coupon->code == "diadamulher") && (($sexo == "Feminino") || ($sexo == "F"))){
        $err = __('Mulheres vocês são demais!', 'woocommerce');
    } elseif (($coupon->code == "diadamulher") && (($sexo == "Masculino") || ($sexo == "M") || ($sexo == ""))) {
        $err = __('Infelizmente esse cupom é válido somente para mulheres, se houve engano, entre em contato conosco pelo <a class="text-white" href="https://api.whatsapp.com/send?phone=5535988598904&text=Estou com problema no cupom dia das mulheres" target="_blank><i class="fa fa-whatsapp fa-fw"></i> whatsapp clicando aqui</a>.', 'woocommerce');
    }
    return $err;
}

// Show message error
add_filter( 'woocommerce_coupon_message', 'ef_woocommerce_coupon_message', 10, 3);
function ef_woocommerce_coupon_message($msg, $msg_code, $coupon){
    $sexo = get_user_meta(get_current_user_id(), 'billing_sex', true);
    if(($coupon->code == 'diadamulher') && (($sexo == 'Feminino') || ($sexo == 'F'))){
        $msg = __('Mulheres vocês são demais!', 'woocommerce');
    }
    return $msg;
}
