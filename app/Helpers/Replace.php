<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use App\Models\Location\Geo;
use App\Models\Location\Chunks\Chunks_variables;
use App\Models\Location\Country;

class Replace
{
	/*
	Региональные настройки подразумевают наличие переменной «Город», которая
	меняется в зависимости от региона. Пример: Доставка в %город% бесплатно от 1 000 рублей.
	Могут ставить во все вьюхи в любое место
	*/
	public static function html($html) {

		$chunks_variables = Chunks_variables::all();
		if ($chunks_variables) {

			$city_info = Geo::city_info();

			$city = $city_info->name ?? '';
			$city_prepositional_case =  $city_info->name_prepositional_case ?? $city;

			$country_id = $city_info->country ?? 0;
			$country_info = Country::where('id', $country_id)->first();

			$country = $country_info->name ?? '';
			$country_prepositional_case =  $country_info->name_prepositional_case ?? $country;

			foreach($chunks_variables AS $variable) {
				$type = $variable->type;
				$name = $variable->name;

				switch ($type) {
					case 'city':
						$html = Str::replace('%'.$name.'%', $city, $html);
						break;
					case 'country':
						$html = Str::replace('%'.$name.'%', $country, $html);
						break;
					case 'in_the_city':
						$html = Str::replace('%'.$name.'%', $city_prepositional_case, $html);
						break;
					case 'in_the_country':
						$html = Str::replace('%'.$name.'%', $country_prepositional_case, $html);
						break;
				}
			}
		}

		return $html;
	}
}

?>
