<?php
/**
 * @name Youtube Helper
 * @author Marc Löhe
 * @license MIT (http://www.opensource.org/licenses/mit-license.php)
 */

class YoutubeHelper extends AppHelper {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * Array of Youtube API's this helper will use 
 *
 * @var array
 */
  private $_apis = array( 
    'player' => 'http://www.youtube.com/embed/' // Youtube Embedded Player
  );

/**
 * Array of iframe options
 *
 * @var array
 */
  private $_iframeOpts = array( 
    'width'       => 640, 
    'height'      => 390,
    'frameborder' => 0,
  );

/* *
 * Player Variables
 *  
 * @var array
 * @see https://developers.google.com/youtube/player_parameters
 */ 
  private $_playerVars = array( 
     'autohide'  => 2, 
     'autoplay'  => 0, 
     'controls'  => 1,
     'enablejsapi'   => 0,
     'loop'      => 0, 
     'origin'    => null,
     'rel'       => 0,
     'showinfo'  => 0,
     'start'     => null,
     'theme'     => 'dark',
   );


/**
 *  Construct YoutubeHelper
 *
 * @param View $view The View this helper is being attached to
 * @param array $settings Configuration settings for the helper
 */
  public function __construct(View $view, $settings = array())
  {
    parent::__construct($view, $settings);
    if (isset($settings['iframeOpts']) &&
      is_array($settings['iframeOpts']))
    {
      $this->_iframeOpts = array_merge($this->_iframeOpts, $settings['iframeOpts']);
    }
    if (isset($settings['playerVars']) &&
      is_array($settings['playerVars']))
    {
      $this->_playerVars = array_merge($this->_playerVars, $settings['playerVars']);
    }
  }

/**
 * Create iframe player
 *
 * @param string $url Youtube video URL or ID
 * @param array $iframeOpts Options for iframe
 * @param array $playerVars Options for player
 * @access public
 */
  public function iframe($url = null, $iframeOpts = array(), $playerVars = array())
  {
    $iframeOpts = array_merge($this->_iframeOpts, $iframeOpts);
    $playerVars = array_merge($this->_playerVars, $playerVars);
    $query = http_build_query($this->_playerVars);
    $src = $this->_apis['player'] . $this->getVideoId($url) . '?' . $query;
    $iframeOpts['src'] = $src;
    return $this->Html->tag('iframe', '', $iframeOpts);
  } 

/**
 * Get Video ID from a URL
 *
 * @param string $url URL of video
 * @return string Video URL
 * @access public
 */
  public function getVideoId($url = null)
  {
    parse_str(parse_url($url, PHP_URL_QUERY), $params); 
    return (isset($params['v']) ? $params['v'] : $url); 
  }

}
