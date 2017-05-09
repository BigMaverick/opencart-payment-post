<?php
class ModelPaymentPostByCheckout extends Model {
	public function getMethod($address, $total) {
		$this->load->language('payment/postby_checkout');

		$status = true;

		$method_data = array();

        $shipping_method = $this->session->data['shipping_method'];
        if ( $shipping_method['code'] != 'postby.postby' ) {
            $status = false;
        } else {
            $status = true;
        }
        
		if ($status) {
			$method_data = array(
				'code'       => 'postby_checkout',
				'title'      => $this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('postby_checkout_sort_order')
			);
		}

		return $method_data;
	}
}