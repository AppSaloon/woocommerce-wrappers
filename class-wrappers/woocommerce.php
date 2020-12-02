<?php

namespace appsaloon\packages\woocommerce;

use Exception;
use WC_Cart;

class Woocommerce {
	/**
	 * @return \WC_Order_Factory|null
	 * @throws Exception
	 */
	public function get_order_factory() {
		if( WC()->order_factory != null ) {
			return WC()->order_factory;
		} else {
			throw new Exception( 'Trying to get WC order factory when none exists' );
		}
	}

	/**
	 * @return WC_Cart
	 * @throws Exception
	 */
	public function get_cart() {
		if( WC()->cart != null ) {
			return WC()->cart;
		} else {
			throw new Exception( 'Trying to get WC cart when none exists' );
		}
	}

	/**
	 * @return string
	 */
	public function get_version() {
		return WC()->version;
	}

	/**
	 * @param $request
	 * @return string
	 */
	public function get_api_request_url_with_ssl( $request ) {
		return WC()->api_request_url( $request, true );
	}

	/**
	 * @param $request
	 * @return string
	 */
	public function get_api_request_url_without_ssl( $request ) {
		return WC()->api_request_url( $request, false );
	}

	/**
	 * @param $request
	 * @return string
	 */
	public function get_api_request_url_with_auto_detect_ssl( $request ) {
		return WC()->api_request_url( $request, null );
	}

	/**
	 * @return string
	 */
	public function get_ajax_url() {
		return WC()->ajax_url();
	}

	/**
	 * @return string
	 */
	public function get_database_version() {
		return WC()->db_version;
	}

	/**
	 * @return string
	 */
	public function get_plugin_path() {
		return WC()->plugin_path();
	}

	/**
	 * @return string
	 */
	public function get_plugin_url() {
		return WC()->plugin_url();
	}

	/**
	 * @return string
	 */
	public function get_template_path() {
		return WC()->template_path();
	}
}