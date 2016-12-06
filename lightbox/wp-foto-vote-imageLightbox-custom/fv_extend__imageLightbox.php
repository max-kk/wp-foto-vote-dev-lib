<?php
/*
  Plugin Name: WP Foto Vote extend - imageLightbox
  Plugin URI: http://wp-vote.net/
  Description: imageLightbox custom using example
  Author: Maxim Kaminsky
  Author URI: http://www.maxim-kaminsky.com/
  Plugin support EMAIL: wp-vote@hotmail.com
  Version: 0.2
  Released: 24/08/2015

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
  ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
  DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
  ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
  ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
  SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly  

/**
 * ImageLightbox library wrapper
 *
 * ================================
 * Usage this structure allows simply add new lightbox to contest list
 *
 * Need only add filter into FV::PREFIX . 'lightbox_list_array'
 * (append you lightbox name and theme, like 'imageLightbox_default')
 *
 * And add action for
 * FV::PREFIX . 'load_lightbox_imageLightbox'
 */
 
add_action('plugins_loaded', array('FvExtend_imageLightboxCustom', 'init'), 11);	
 
class FvExtend_imageLightboxCustom {

    const NAME = 'imageLightboxC';
    const VER = 0.2;
	
	public static function init () {
		add_action( self::getActionName(), array('FvExtend_imageLightboxCustom', 'assets') );
		add_filter( FV::PREFIX . 'lightbox_list_array', array('FvExtend_imageLightboxCustom', 'initListThemes') );
	}

    /**
     * Enqueue assets
     *
     * @since    2.2.082 main pluign
     *
     * @param string $theme     Key, like `default`
     * @return void
     */
    public static function assets ( $theme = '' ) {
		$addonUrl = plugin_dir_url(__FILE__);
		
        wp_enqueue_script( 'fv-lightbox-imageLightboxCustom', $addonUrl . 'assets/jQuery.imageLightbox.js', array('jquery'), self::VER, true );
        wp_enqueue_style( 'fv-lightbox-imageLightboxCustom', $addonUrl . 'assets/jQuery.imageLightbox.min.css', array(), self::VER );
    }

    /**
     * Return name of action, that must be called for load this lightbox assets
     *
     * @since    2.2.082 main pluign
     *
     * @return string
     */
    public static function getActionName () {
        return FV::PREFIX . 'load_lightbox_' . self::NAME;
    }

    /**
     * Add supported themes list to settings
     *
     * @since    2.2.082 main pluign
     *
     * @param array $lightbox_list
     * @return array
     */
    public static function initListThemes ( $lightbox_list ) {
        //FV::PREFIX . 'lightbox_list_array'
		$lightbox_list[self::NAME . '_custom'] = 'imageLightboxCustom :: custom';
        return $lightbox_list;
    }
}