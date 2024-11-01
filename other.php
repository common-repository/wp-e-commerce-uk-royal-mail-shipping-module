<?php

		$basePriceE = 3.62;
		$additional100gE = 0.60;
		$basePriceI = 5.70;
		$additional100gI = 1.28;
		
		//If in Europe then
		if ($weight <= 100) {
			$weight = 100;
			$royalmail["europe"][$weight] = 2.70;
			$royalmail["international"][$weight] = 3.30;
		} else if ($weight <= 150) {
			$weight = 150;
			$royalmail["europe"][$weight] = 2.93;
			$royalmail["international"][$weight] = 3.90;
		} else if ($weight <= 200) {
			$weight = 200;
			$royalmail["europe"][$weight] = 3.16;
			$royalmail["international"][$weight] = 4.50;
		} else if ($weight <= 250) {
			$weight = 250;
			$royalmail["europe"][$weight] = 3.39;
			$royalmail["international"][$weight] = 5.10;
		} else if ($weight <= 300) {
			$weight = 300;
			$royalmail["europe"][$weight] = 3.62;
			$royalmail["international"][$weight] = 5.70;
		} else if ($weight <= 400) {
			$weight = 400;
			$royalmail["europe"][$weight] = $basePriceE +($additional100gE);
			$royalmail["international"][$weight] = $basePriceI +($additional100gI);
		} else if ($weight <= 500) {
			$weight = 500;
			$royalmail["europe"][$weight] = $basePriceE+($additional100gE*2);
			$royalmail["international"][$weight] = $basePriceI+($additional100gI*2);
		} else if ($weight <= 600) {
			$weight = 600;
			$royalmail["europe"][$weight] = $basePriceE+($additional100gE*3);
			$royalmail["international"][$weight] = $basePriceI+($additional100gI*3);
		} else if ($weight <= 700) {
			$weight = 700;
			$royalmail["europe"][$weight] = $basePriceE+($additional100gE*4);
			$royalmail["international"][$weight] = $basePriceI+($additional100gI*4);
		} else if ($weight <= 800) {
			$weight = 800;
			$royalmail["europe"][$weight] = $basePriceE+($additional100gE*5);
			$royalmail["international"][$weight] = $basePriceI+($additional100gI*5);
		} else if ($weight <= 900) {
			$weight = 900;
			$royalmail["europe"][$weight] = $basePriceE+($additional100gE*6);
			$royalmail["international"][$weight] = $basePriceI+($additional100gI*6);
		} else if ($weight <= 1000) {
			$weight = 1000;
			$royalmail["europe"][$weight] = $basePriceE+($additional100gE*7);
			$royalmail["international"][$weight] = $basePriceI+($additional100gI*7);
		} else if ($weight <= 5000) {
			$weight = 5000;
			$royalmail["europe"][$weight] = '';
			$royalmail["international"][$weight] = '';

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

		//Check whether each option is valid
		if ($royalmail["europe"][$weight] != '') {
			$europe = $royalmail["europe"][$weight] + $uk_shipping_rates['europe-charge'];
			$europe_valid = true;
		}
		if ($royalmail["international"][$weight] != '') {
			$international = $royalmail["international"][$weight] + $uk_shipping_rates['international-charge'];
			$international_valid = true;
		}

		//If Europe rate is valid then add to array
		if ($europe_valid == true && $country == "europe") {
			if ($price <= $RoyalMailCover AND $uk_shipping_rates['airmail'] == 1 OR $price > $RoyalMailCover AND $uk_shipping_rates['airmailV'] == 1) {			
			$postagearray["Airmail"] = (float) $europe;
			}
		}
		
		//If International Class is valid then add to array
		if ($international_valid == true && $country == "international") {
			if ($price <= $RoyalMailCover AND $uk_shipping_rates['airmail'] == 1 OR $price > $RoyalMailCover AND $uk_shipping_rates['airmailV'] == 1) {			
				$postagearray["Airmail"] = (float) $international;
			}
		}

?>