<?php
namespace appsaloon\packages\woocommerce\function_wrappers;

use Exception;
use WC_Product;

class Woocommerce_Functions {

	/**
	 * @param $product_id
	 * @return WC_Product
	 * @throws Exception
	 */
	public function get_product($product_id): WC_Product
	{
		$product = wc_get_product( $product_id = false );

		if( $product instanceof WC_Product ) {
			return $product;
		} else {
			throw new Exception( 'Product ' . $product_id . ' not found' );
		}
	}

	public function is_cart(): bool
	{
		return is_cart();
	}

	/**
	 * Returns true if the product is a variable product.
	 * Parameter $product_id is optional, if non given it will use the product id of the product page this is called on.
	 *
	 * @param bool $product_id
	 * @return bool
	 * @throws Exception
	 */
	public function is_variable_product( $product_id = false ): bool
	{
		return $this->get_product( $product_id )->is_type( 'variable' );
	}

	/**
	 * Returns true if the product is a simple product.
	 * Parameter $product_id is optional, if non given it will use the product id of the product page this is called on.
	 *
	 * @param bool $product_id
	 * @return bool
	 * @throws Exception
	 */
	public function is_simple_product( $product_id = false ): bool
	{
		return $this->get_product( $product_id )->is_type( 'simple' );
	}

	/**
	 * Returns the product id if the current product exists, false if not.
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function get_product_id() {
		return $this->get_product()->get_id();
	}

	/**
	 * Returns the product's price, if no product_id provided it will use the product id of the product you are viewing.
	 *
	 * @param bool $product_id
	 * @return string
	 * @throws Exception
	 */
	public function get_product_price( $product_id = false ): string
	{
		return $this->get_product( $product_id )->get_price();
	}
}