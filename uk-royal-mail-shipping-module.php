<?php
/*
 Plugin Name: WP E-Commerce UK Royal Mail Shipping Module
 Plugin URI: http://www.designng.co.uk
 Description: WP E-commerce postage/shipping module allows you to offer Royal Mail 1st class and 2nd class Services to your customers amongst other services. <a href="options-general.php?page=wpsc-settings&tab=shipping">To get started, activate this module within WP E-Commerce.</a>
 Version: 2.0
 Author: DesignNG
 Author URI: http://www.designng.co.uk
*/


class uk_shipping {

	var $internal_name;
	var $name;
	var $is_external;

	function uk_shipping () {

		$this->internal_name = "uk_posting_lite";
		
		$this->name = "UK Royal Mail Posting";

		$this->is_external = FALSE;

		return true;
	}
	
	function getName() {
		return $this->name;
	}
	
	function getInternalName() {
		return $this->internal_name;
	}
	
	
	function getForm() {
	
		$shipping = get_option('uk_shipping_options_lite');
		
		// For orders unders £50
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<p>Please ensure all your products have weights specified in grams. This is required for this plugin to work.</p>';
		$output .= '		<p><strong>Please note:</strong> This plugin has various features disabled. To unlock all these extra services, upgrade your plugin at: <a href="http://www.designng.co.uk/wp-ecommerce-royal-mail-module/">www.designng.co.uk/wp-ecommerce-royal-mail-module/</a></p>';
		$output .= '		<h3 style="cursor:default;color:#464646;margin:5px 0;">Choose services you would like to offer for orders <u>under</u> &pound;50</h3>';
		$output .= '		<p style="font-size:11px;color:#777777;margin:5px; padding:0 5px;">All of Royal Mails service offer compensation of up to &pound;50. So for orders worth under this amount, tick the approriate boxes for services you would like to offer.</p>';
		$output .= '	</td>';
		$output .= '</tr>';
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<table style="width:450px; margin-left:5px;">';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[1stclass]" value="" /><input style="width:20px;" type="checkbox" name="shipping[1stclass]" value="1"';
			if (htmlentities($shipping["1stclass"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 1st Class<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[1stclassrecorded]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[1stclassrecorded]" value="1"';
			if (htmlentities($shipping["1stclassrecorded"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 1st Class Recorded<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[2ndclass]" value="" /><input style="width:20px;" type="checkbox" name="shipping[2ndclass]" value="1"';
			if (htmlentities($shipping["2ndclass"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 2nd Class<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[2ndclassrecorded]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[2ndclassrecorded]" value="1"';
			if (htmlentities($shipping["2ndclassrecorded"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 2nd Class Recorded<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[specialdelivery]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[specialdelivery]" value="1"';
			if (htmlentities($shipping["specialdelivery"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Special Delivery<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[specialdeliverysat]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[specialdeliverysat]" value="1"';
			if (htmlentities($shipping["specialdeliverysat"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Special Delivery - Saturday<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[parcelforce24]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[parcelforce24]" value="1"';
			if (htmlentities($shipping["parcelforce24"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> ParcelForce 24<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[parcelforce48]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[parcelforce48]" value="1"';
			if (htmlentities($shipping["parcelforce48"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> ParcelForce 48<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[airmail]" value="" /><input style="width:20px;" type="checkbox" name="shipping[airmail]" value="1"';
			if (htmlentities($shipping["airmail"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Airmail<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[airmailsignedfor]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[airmailsignedfor]" value="1"';
			if (htmlentities($shipping["airmailsignedfor"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Airmail Signed For<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '		</table>';
		$output .= '	</td>';
		$output .= '</tr>';
		
		
		// For orders over £46
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<h3 style="cursor:default;color:#464646;margin:5px 0;">Choose services you would like to offer for orders <u>over</u> &pound;50</h3>';
		$output .= '		<p style="font-size:11px;color:#777777;margin:5px; padding:0 5px;">If your order value is over &pound;50 how would you like to send it? Only Special Delivery, ParcelForce and International Signed For offer compensation above &pound;50. If these are ticked we will offer the customer the sevices with appropriate compensation cover included.</p>';
		$output .= '	</td>';
		$output .= '</tr>';
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<table style="width:450px; margin-left:5px;">';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[1stclassV]" value="" /><input style="width:20px;" type="checkbox" name="shipping[1stclassV]" value="1"';
			if (htmlentities($shipping["1stclassV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 1st Class<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[1stclassrecordedV]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[1stclassrecordedV]" value="1"';
			if (htmlentities($shipping["1stclassrecordedV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 1st Class Recorded<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[2ndclassV]" value="" /><input style="width:20px;" type="checkbox" name="shipping[2ndclassV]" value="1"';
			if (htmlentities($shipping["2ndclassV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 2nd Class<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[2ndclassrecordedV]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[2ndclassrecordedV]" value="1"';
			if (htmlentities($shipping["2ndclassrecordedV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> 2nd Class Recorded<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[specialdeliveryV]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[specialdeliveryV]" value="1"';
			if (htmlentities($shipping["specialdeliveryV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Special Delivery<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[specialdeliverysatV]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[specialdeliverysatV]" value="1"';
			if (htmlentities($shipping["specialdeliverysatV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Special Delivery - Saturday<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[parcelforce24V]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[parcelforce24V]" value="1"';
			if (htmlentities($shipping["parcelforce24V"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> ParcelForce 24<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[parcelforce48V]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[parcelforce48V]" value="1"';
			if (htmlentities($shipping["parcelforce48V"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> ParcelForce 48<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[airmailV]" value="" /><input style="width:20px;" type="checkbox" name="shipping[airmailV]" value="1"';
			if (htmlentities($shipping["airmailV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Airmail<br />';
		$output .= '				</td><td style="width:50%; vertical-align:middle; padding-bottom:5px;">';
			$output .= '<input type="hidden" name="shipping[airmailsignedforV]" value="" /><input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[airmailsignedforV]" value="1"';
			if (htmlentities($shipping["airmailsignedforV"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Airmail Signed For<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '		</table>';
		$output .= '	</td>';
		$output .= '</tr>';


		// Free Delivery Options
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<h3 style="cursor:default;color:#464646;margin:5px 0;">Free Delivery Options</h3>';
		$output .= '		<p style="font-size:11px;color:#777777;margin:5px; padding:0 5px;">To enable free delivery, just tick the appropriate box. Then enter the price you would like Free Delivery to start from in the second box. For example, to offer Free Delivery on orders over &pound;30 in the UK, tick the UK box and enter 30 or 30.00 in the second box</p>';
		$output .= '	</td>';
		$output .= '</tr>';		
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<table style="width:450px; margin-left:5px;">';
		$output .= '			<tr>';
		$output .= '				<td style="width:40%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input type="hidden" name="shipping[freedelivery]" value="" />';
		$output .= '					<input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[freedelivery]" value="1"';
			if (htmlentities($shipping["freedelivery"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> UK Free Delivery<br />';
		$output .= '				</td><td style="width:60%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input disabled="disabled" style="width:30px;" type="text" name="shipping[freedeliveryamount]" value="'.htmlentities($shipping['freedeliveryamount']).'"> Price to start Free UK Delivery<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:40%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input type="hidden" name="shipping[freedeliveryE]" value="" />';
		$output .= '					<input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[freedeliveryE]" value="1"';
			if (htmlentities($shipping["freedeliveryE"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> Europe Free Delivery<br />';
		$output .= '				</td><td style="width:60%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input disabled="disabled" style="width:30px;" type="text" name="shipping[freedeliveryEamount]" value="'.htmlentities($shipping['freedeliveryEamount']).'"> Price to start Free Europe Delivery<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '			<tr>';
		$output .= '				<td style="width:40%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input type="hidden" name="shipping[freedeliveryI]" value="" />';
		$output .= '					<input disabled="disabled" style="width:20px;" type="checkbox" name="shipping[freedeliveryI]" value="1"';
			if (htmlentities($shipping["freedeliveryI"]) == "1") { 
				$output .= ' checked="checked"'; 
			}
			$output .= '> International Free Delivery<br />';
		$output .= '				</td><td style="width:60%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input disabled="disabled" style="width:30px;" type="text" name="shipping[freedeliveryIamount]" value="'.htmlentities($shipping['freedeliveryIamount']).'"> Price to start Free International Delivery<br />';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '		</table>';
		$output .= '	</td>';
		$output .= '</tr>';
		
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<h3 style="cursor:default;color:#464646;margin:5px 0;">Packaging Options</h3>';
		$output .= '		<p style="font-size:11px;color:#777777;margin:5px; padding:0 5px;">You can enter your packaging weight in grams below. We will add this to the overall weight of items ordered and give customers the appropriate Royal Mail price accordingly. Eg, to add 20 grams, just enter 20</p>';
		$output .= '	</td>';
		$output .= '</tr>';		
		
		
		// Packaging Options
		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		<table style="width:450px; margin-left:5px;">';
		$output .= '			<tr>';
		$output .= '				<td style="vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input disabled="disabled" type="text" style="width:50px;" name="shipping[packaging]" value="'.htmlentities($shipping['packaging']).'"> Weight of packaging (in grams)';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '		</table>';
		$output .= '		<p style="font-size:11px;color:#777777;margin:5px; padding:0 5px;">You can also enter your packaging costs here if you wish. We will add this on to the base Royal Mail packet rate postage price. Eg, for &pound;1.00 enter 1 or 1.00</p>';
		$output .= '		<table style="width:450px; margin-left:5px;">';
		$output .= '			<tr>';
		$output .= '				<td style="width:33%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input type="text" style="width:50px;" name="shipping[uk-charge]" value="'.htmlentities($shipping['uk-charge']).'"> UK';
		$output .= '				</td>';
		$output .= '				<td style="width:33%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input type="text" style="width:50px;" name="shipping[europe-charge]" value="'.htmlentities($shipping['europe-charge']).'"> Europe';
		$output .= '				</td>';
		$output .= '				<td style="width:33%; vertical-align:middle; padding-bottom:5px;">';
		$output .= '					<input type="text" style="width:50px;" name="shipping[international-charge]" value="'.htmlentities($shipping['international-charge']).'"> International';
		$output .= '				</td>';
		$output .= '			</tr>';
		$output .= '		</table>';
		$output .= '	</td>';
		$output .= '</tr>';

		return $output;
	}
	


	function submit_form() {

		if($_POST['shipping'] != null) {

			$shipping = (array)get_option('uk_shipping_options_lite');
			$submitted_shipping = (array)$_POST['shipping'];

			update_option('uk_shipping_options_lite',array_merge($shipping, $submitted_shipping));

		}

		return true;

	}
	

	function get_item_shipping(&$cart_item) {

		global $wpdb, $wpsc_cart;

		$unit_price = $cart_item->unit_price;
		$quantity = $cart_item->quantity;
		$weight = $cart_item->weight;
		$product_id = $cart_item->product_id;

		$uses_billing_address = false;
		foreach ($cart_item->category_id_list as $category_id) {
			$uses_billing_address = (bool)wpsc_get_categorymeta($category_id, 'uses_billing_address');
			if ($uses_billing_address === true) {
				break; /// just one true value is sufficient
			}
		}

		if (is_numeric($product_id) && (get_option('do_not_use_shipping') != 1)) {
			if ($uses_billing_address == true) {
				$country_code = $wpsc_cart->selected_country;
			} else {
				$country_code = $wpsc_cart->delivery_country;
			}

			if ($cart_item->uses_shipping == true) {
				//if the item has shipping
				$additional_shipping = '';
				if (isset($cart_item->meta[0]['shipping'])) {
					$shipping_values = $cart_item->meta[0]['shipping'];
				}
				if (isset($shipping_values['local']) && $country_code == get_option('base_country')) {
					$additional_shipping = $shipping_values['local'];
				} else {
					if (isset($shipping_values['international'])) {
						$additional_shipping = $shipping_values['international'];
					}
				}
				$shipping = $quantity * $additional_shipping;
			} else {
				//if the item does not have shipping
				$shipping = 0;
			}
		} else {
			//if the item is invalid or all items do not have shipping
			$shipping = 0;
		}
		return $shipping;
	}
	


	function getQuote() {

		global $wpdb, $wpsc_cart;
		
		if (isset($_POST['country'])) {
			$country = $_POST['country'];
			$_SESSION['wpsc_delivery_country'] = $country;
		} else {
			$country = $_SESSION['wpsc_delivery_country'];
		}
		
		$uk_shipping_rates = get_option('uk_shipping_options_lite');

		$weight = wpsc_cart_weight_total() * 453.6;
			
		$inEU = array("AL", "AD", "AM", "AT", "BY", "BE", "BA", "BG", "CH", "CY", "CZ", "DE", "DK", "EE", "ES", "FO", "FI", "FR", "GE", "GI", "GR", "HU", "HR", "IE", "IS", "IT", "LT", "LU", "LV", "MC", "MK", "MT", "NO", "NL", "PO", "PT", "RO", "RU", "SE", "SI", "SK", "SM", "TR", "UA", "VA");
		
		if (is_object($wpsc_cart)) {
			$price = $wpsc_cart->calculate_subtotal(false);
		}

		if ($country == 'UK' || $country == 'GB') {
			include "uk.php";
		} else if (in_array($country, $inEU)) {
			$country = "europe";
			include "other.php";
		} else {
			$country = "international";
			include "other.php";
		}
		
		return $postagearray;
	}
		
} 

function uk_shipping_add($wpsc_shipping_modules) {

	global $uk_shipping;
	$uk_shipping = new uk_shipping();

	$wpsc_shipping_modules[$uk_shipping->getInternalName()] = $uk_shipping;

	return $wpsc_shipping_modules;
}
	
add_filter('wpsc_shipping_modules', 'uk_shipping_add');
?>
