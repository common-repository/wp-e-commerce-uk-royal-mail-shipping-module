<?php

		//If in UK then
		if ($weight <= 100) {
			$weight = 100;
			$royalmail["FirstClass"][$weight] = 2.70;
			$royalmail["SecondClass"][$weight] = 2.20;
		} else if ($weight <= 250) {
			$weight = 250;
			$royalmail["FirstClass"][$weight] = 2.70;
			$royalmail["SecondClass"][$weight] = 2.20;
		} else if ($weight <= 500) {
			$weight = 500;
			$royalmail["FirstClass"][$weight] = 2.70;
			$royalmail["SecondClass"][$weight] = 2.20;
		} else if ($weight <= 750) {
			$weight = 750;
			$royalmail["FirstClass"][$weight] = 2.70;
			$royalmail["SecondClass"][$weight] = 2.20;
		} else if ($weight <= 1000) {
			$weight = 1000;
			$royalmail["FirstClass"][$weight] = 4.30;
			$royalmail["SecondClass"][$weight] = 3.50;
		} else if ($weight <= 5000) {
			$weight = 5000;
			$royalmail["FirstClass"][$weight] = '';
			$royalmail["SecondClass"][$weight] = '';

			GLOBAL $RoyalMailShippingEmailAlertSent;
			if ($RoyalMailShippingEmailAlertSent != true) {
				$admin_email = get_settings('admin_email');
				$subject = 'WP E-Commerce Shipping Alert';
				$body = 'Hi there... Somebody tried to add more than 1KG of items of products to your basket. The free WP E-Commerce Royal Mail Shipping Module only calculates up to 1KG of items and therefore the customer was unable to proceed. To remove this restriction and to gain extra features, please purchase the PRO version from: www.designng.co.uk/wp-ecommerce-royal-mail-module/';
				$headers = 'From:' . get_settings('admin_email');
				mail($admin_email, $subject, $body, $headers);
				$RoyalMailShippingEmailAlertSent = true;
			}
		};

		$RoyalMailCover = 50;
		
		// Second Class
		if ($royalmail["SecondClass"][$weight] != '') {
			$secondclass = $royalmail["SecondClass"][$weight] + $uk_shipping_rates['uk-charge'];
			
			// If second class is valid
			if ($price <= $RoyalMailCover AND $uk_shipping_rates['2ndclass'] == 1 OR $price > $RoyalMailCover AND $uk_shipping_rates['2ndclassV'] == 1) {
				$postagearray["2nd Class"] = (float) $secondclass;
			}
		}
		
		// First Class
		if ($royalmail["FirstClass"][$weight] != '') {
			$firstclass = $royalmail["FirstClass"][$weight] + $uk_shipping_rates['uk-charge'];
		
			// If first class is valid
			if ($price <= $RoyalMailCover AND $uk_shipping_rates['1stclass'] == 1 OR $price > $RoyalMailCover AND $uk_shipping_rates['1stclassV'] == 1) {
				$postagearray["1st Class"] = (float) $firstclass;
			}
		}

?>