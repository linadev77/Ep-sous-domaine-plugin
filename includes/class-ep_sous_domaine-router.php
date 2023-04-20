<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://takamoastudio.com/
 * @since      0.0.0
 *
 * @package    Ep-sous-domaine-plugin
 * @subpackage Ep-sous-domaine-plugin/studio
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.0.0
 * @package    Ep-sous-domaine-plugin
 * @subpackage Ep-sous-domaine-plugin/studio
 * @author     Takamoa Studio <responsable@takamoastudio.com>
 */

class Ep_sous_domaine_Router{
	public function include_template( $template )
	{
			//try and get the query var we registered in our query_vars() function
			$angular_page = get_query_var( 'angular_page' );

			//if the query var has data, we must be on the right page, load our custom template
			if ( $angular_page ) {				
				return plugin_dir_path( dirname( __FILE__ ) ) . "studio/index.html";
			}

			return $template;
	}
    
	public function flush_rules()
	{
			$this->rewrite_rules();
			flush_rewrite_rules();
	}

	public function rewrite_rules()
	{
			add_rewrite_rule( 'studio/(.+?)$', 'index.php?angular_page=$matches[1]', 'top');
			add_rewrite_tag( '%angular_page%', '([^&]+)' );
	}
        
}