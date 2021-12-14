<?php

class HEEX_HelloWorld extends ET_Builder_Module
{

	public $slug       = 'heex_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https:\\herhesh-extension.com',
		'author'     => 'Ahmed Herhesh',
		'author_uri' => 'https:\\herhesh-extension.com',
	);

	public function init()
	{
		$this->name = esc_html__('Herhesh Extension', 'heex-herhesh-extension');
		$this->custom_css_fields = array(
			'title' => array(
				'label'    => esc_html__( 'Title', 'dicm-divi-custom-modules' ),
				'selector' => '.et-title',
			),
			'content-controller' => array(
				'label'    => esc_html__( 'Button', 'dicm-divi-custom-modules' ),
				'selector' => '.et_pb_button',
			),
		);
	}

	public function get_fields()
	{
		return array(
			'content' => array(
				'label'           => esc_html__('Content', 'heex-herhesh-extension'),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'show_if'  => [
					'content-controller' => 'on'
				],
				'description'     => esc_html__('Content entered here will appear inside the module.', 'heex-herhesh-extension'),
				'toggle_slug'     => 'main_content',
			),
			'content-controller' => array(
				'label'           => esc_html__('content-controller', 'heex-herhesh-extension'),
				'type'            => 'select',
				'options'		  => [
					'on'    => 'on',
					'off'   => 'off'
				],
				'option_category' => 'basic_option',
				'description'     => esc_html__('text entered here will appear inside the module.', 'heex-herhesh-extension'),
				// 'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render($attrs, $content = null, $render_slug)
	{
		return sprintf('<h1>%1$s%2$s</h1>', $this->props['content-controller'], $this->props['content']);
	}
}

new HEEX_HelloWorld;
