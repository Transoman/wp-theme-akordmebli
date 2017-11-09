<?php

/**
 * Adding field to taxomomi
 */
// if(function_exists("register_field_group"))
// {
// 	register_field_group(array (
// 		'id' => 'acf_katehorii-tovariv',
// 		'title' => 'Категорії товарів',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_59ee14a4b0fa1',
// 				'label' => 'Іконка',
// 				'name' => 'icon_category_shop',
// 				'type' => 'text',
// 				'instructions' => 'Іконка для категорії.',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'ef_taxonomy',
// 					'operator' => '==',
// 					'value' => 'product_cat',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'default',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_propozytsii',
// 		'title' => 'Пропозиції',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_59f08d62c9c2a',
// 				'label' => 'Посилання',
// 				'name' => 'action_link',
// 				'type' => 'text',
// 				'instructions' => 'Посилання на акцію',
// 				'default_value' => '#',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'special',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'default',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_slaider',
// 		'title' => 'Слайдер',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_59f0960393f98',
// 				'label' => 'Посилання',
// 				'name' => 'slider_link',
// 				'type' => 'text',
// 				'default_value' => '#',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_59f0975f0abd1',
// 				'label' => 'Текст на кнопці',
// 				'name' => 'text_on_btn',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_59faded682020',
// 				'label' => 'Popup',
// 				'name' => 'popup',
// 				'type' => 'checkbox',
// 				'instructions' => 'Відкривати в спливаючому вікні?',
// 				'choices' => array (
// 					'yes' => 'Так',
// 				),
// 				'default_value' => '',
// 				'layout' => 'vertical',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'slider',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'default',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_chomu-same-my',
// 		'title' => 'Чому саме ми',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_59fae364a50dc',
// 				'label' => 'Іконка',
// 				'name' => 'icon_advantage',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'advantages',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'default',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// }