# CakePHP 2.x Youtube Helper

Include Youtube-Players quick and easy

Inspired by:

* [Youtube Helper by Tomas Pavlatka](http://bakery.cakephp.org/articles/pavlatka/2011/09/09/youtube_helper_using_youtube_iframe_player_api)
* [Youtube Helper by Carly Marie](http://bakery.cakephp.org/articles/cmarie/2010/11/20/youtube_helper_3)


## Requirements

* CakePHP 2.x

## Installation

### Git Clone


In your app directory:

    git clone git://github.com/boundaryfunctions/YoutubeHelper.git Plugin/Youtube

### Git Submodule

In your app directory:

    git submodule add git://github.com/boundaryfunctions/YoutubeHelper.git Plugin Youtube
    git update --init

### Without Git:

Download the [zipball](https://github.com/boundaryfunctions/YoutubeHelper/zipball/master "Download the repository zipped") and extract it to `app/Plugin/Youtube`.

## Usage

## Controller

Include the helper in your Controller:

    <?php
    class MyController extends AppController {
      public $helpers = array('Youtube.Youtube');
    }

You can also pass your own defaults for Iframe and Player to the helper like this:

    <?php
    class MyController extends AppController {
      public $helpers = array(
        'Youtube.Youtube' => array(
          'iframeOpts' => array(
            'width' => 640,
            'height' => 390,
            'frameborder' => 0
          ),
          'playerVars' = array(
            'autohide'    => 2,
            'autoplay'    => 0,
            'controls'    => 1,
            'enablejsapi' => 0,
            'loop'        => 0, 
            'origin'      => null,
            'rel'         => 0,
            'showinfo'    => 0,
            'start'       => null,
            'theme'       => 'dark'
          ),
        ),
      );
    }

Above you can see all default values. Additionally, you can specify additional options for `iframeopts` as you would pass it as the third argument `$options` to the (`HtmlHelper::tag()`)[http://api20.cakephp.org/class/html-helper#method-HtmlHelpertag] function.

You can also add more (query paramaters)[https://developers.google.com/youtube/player_parameters#Parameters] to the `playerVars` array. If you want to remove a default parameter from the query, set it to `null`.

## View

After including the helper in your controller, you can use it like this in your views:

    $this->Youtube->iframe($url);

Where `$url` is a valid Youtube URL (i.e. `http://www.youtube.com/watch?v=Zln9I9IttLA`) or ID (i.e. `Zln9I9IttLA`).

Additionaly, you can add custom options for the current Video only by passing an array of options for the Iframe as second argument and an array of parameters for the player as third argument:

    $this->Youtube->iframe($url, array('width' => 640), array('autohide' => 2));

## To do:

* Method to show Youtube Preview Images
* Method to include Iframes with (Youtube Javascript Iframe API)[https://developers.google.com/youtube/iframe_api_reference]

## License

Copyright (c) 2012 Marc Löhe

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
